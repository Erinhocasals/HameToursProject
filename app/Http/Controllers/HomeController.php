<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmationMail;
use App\Mail\ReservationRemittanceMail;
use App\Models\Beneficiary;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Data;
use App\Models\Entity;
use App\Models\Info;
use App\Models\Location as ModelsLocation;
use App\Models\Log;
use App\Models\Menu;
use App\Models\MenuLink;
use App\Models\Package;
use App\Models\Price;
use App\Models\Reservation;
use App\Models\ReservationElement;
use App\Models\Slide;
use App\Models\Status;
use App\Models\Template;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserShareContent;
use Carbon\Carbon;
use Exception;
use GeoIp2\Model\Country;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;
use Khsing\World\World;
use Stevebauman\Location\Facades\Location;
use Str;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('category_id', '=', null)
            ->where('enabled', '=', true)
            ->where('show_in_home', '=', true)
            ->whereHas('showcase')
            ->get();

        $infos = Info::where('show_in_home', '=', true)
            ->where('enabled', '=', true)
            ->get();

        $packages = Package::where('starred', '=', true)
            ->where('enabled', '=', true)
            ->get();

        $blogs = Blog::where('enabled', '=', true)->latest()->take(2)->get();

        $template = Template::where('friendly', '=', 'footer-blog')->firstOrFail();
        $packagetemplate = Template::where('friendly', '=', 'paquetes-destacados')->firstOrFail();

        $slideshows = Slide::where('enabled', '=', true)->inRandomOrder()->take(1)->get();
        $homemenus = Menu::where('enabled', '=', true)->where('show_in_home', '=', true)->get();

        return view('front.welcome', compact('categories', 'infos', 'packages', 'blogs', 'template', 'packagetemplate', 'slideshows', 'homemenus'));
    }

    public function search(Request $request)
    {

        $filters = json_decode($request->get('filters'));
        $q = $request->get('q');
        $date_start = $request->get('start');
        $date_end = $request->get('end');

        $entities = Entity::where('enabled', '=', true);

        if (count($filters) > 0) {
            $entities->whereHas('filters', function ($q) use ($filters) {
                $q->whereIn('filters.id', $filters);
            });
        }

        if ($q) {
            $entities->where('title', 'LIKE', '%' . $q . '%');
        }

        if ($date_start && $date_end) {
            $date_start = Carbon::createFromFormat('d/m/Y', $date_start);
            $date_end = Carbon::createFromFormat('d/m/Y', $date_end);

            $entities->where('date_start', '>=', $date_start->format('Y-m-d'));
            $entities->where('date_end', '<=', $date_end->format('Y-m-d'));
        } else {
            if ($date_start) {
                $date_start = Carbon::createFromFormat('d/m/Y', $date_start);
                $entities->where('date_start', '=', $date_start->format('Y-m-d'));
            }
            if ($date_end) {
                $date_end = Carbon::createFromFormat('d/m/Y', $date_end);
                $entities->where('date_end', '=', $date_end->format('Y-m-d'));
            }
        }

        $entities = $entities->get();

        $print = "";

        foreach ($entities as $entity) {
            $link = $entity->frontLink();
            $print .= '<div class="featured-story block-featured-story__item js-featured-story w-full mt-0 mb-1 load-animation">
                <h4 class="featured-story__heading text-white mb-0">' . $entity->title . '</h4>
                <a href="' . $link . '" class="button-arrow button-arrow--inverted button-arrow--reversed story__button text-white">
                    <span class="button-arrow__label">
                        Leer más
                        <span class="button-arrow__icon"></span>
                    </span>
                    <span class="button-arrow__line"></span>
                </a>
            </div>';
        }

        $definitions = Category::where('enabled', '=', true);
        if ($q) {
            $definitions->where('title', 'LIKE', '%' . $q . '%');
        }
        $definitions = $definitions->get();

        foreach ($definitions as $definition) {
            $link = $definition->frontLink();
            $print .= '<div class="featured-story block-featured-story__item js-featured-story w-full mt-0 mb-1 load-animation">
                <h4 class="featured-story__heading text-white mb-0">' . $definition->title . '</h4>
                <a href="' . $link . '" class="button-arrow button-arrow--inverted button-arrow--reversed story__button text-white">
                    <span class="button-arrow__label">
                        Leer más
                        <span class="button-arrow__icon"></span>
                    </span>
                    <span class="button-arrow__line"></span>
                </a>
            </div>';
        }

        if (count($entities) == 0 && count($definitions) == 0)
            $print = "<p>No se encontró ningún resultado de búsqueda que cumpla con los criterios establecidos</p>";

        return $print;
    }

    public function group($friendly)
    {
        $menu = Menu::where('friendly', '=', $friendly)
            ->where('enabled', '=', true)
            ->firstOrFail();

        $links = MenuLink::where('menu_id', '=', $menu->id)->latest()->paginate(4);

        if (FacadesRequest::ajax()) {
            $print = "";
            foreach ($links as $link) {
                if ($link->menuable) {
                    $imageHtml = "";
                    if ($link->menuable->image) {
                        $imageHtml .= '<div class="featured-story__image-wrapper">
                            <div class="responsive-image responsive-image--parallax featured-story__image js-image">
                                <picture class="responsive-image__picture " data-component="parallax" data-parallax-offset="100" data-parallax-direction="-1" data-parallax-start="-50">
                                    <source media="(min-width: 768px)" data-srcset="' . Storage::url($link->menuable->image->url) . '" type="image/webp">
                                    <img class="responsive-image__img lazyload" data-src="' . Storage::url($link->menuable->image->url) . '" alt="' . $link->menuable->title . '">
                                </picture>
                            </div>
                        </div>';
                    }

                    $print .= '<li class="featured-story block-featured-story__item js-featured-story load-animation">
                        ' . $imageHtml . '
                        <h4 class="featured-story__heading">' . $link->menuable->title . '</h4>
                        <h5 class="featured-story__subheading">' . $link->menuable->created_at . '</h5>
                        ' . $link->menuable->summary . '
                        <a href="' . $link->url . '" class="button-arrow button-arrow--inverted button-arrow--reversed story__button">
                            <span class="button-arrow__label">
                                Detalles <span class="button-arrow__icon"></span>
                            </span>
                            <span class="button-arrow__line"></span>
                        </a>
                    </li>';
                }
            }
            return $print;
        }

        return view('front.group', compact('menu', 'links'));
    }

    public function category(Request $request, $friendly)
    {
        $category = Category::where('friendly', '=', $friendly)
            ->where('enabled', '=', true)
            ->firstOrFail();
        $activity_template = Template::where('friendly', '=', 'actividades')->firstOrFail();

        $data = Data::where('key', '=', 'global')->first();
        $templateShare = Template::where('friendly', '=', 'compartir-contenido-promocional')->first();

        return view('front.category', compact('category', 'activity_template', 'data', 'templateShare'));
    }

    public function entity(Request $request, $friendly)
    {
        $category = $request->get('category');
        $package = $request->get('package');
        $referral = $request->get('ref');

        if ($category) {
            $category = Category::where('enabled', '=', true)
                ->where('friendly', '=', $category)
                ->firstOrFail();
        }

        if ($package) {
            $package = Package::where('enabled', '=', true)
                ->where('friendly', '=', $package)
                ->firstOrFail();
        }

        $entity = Entity::where('friendly', '=', $friendly)
            ->where('enabled', '=', true);

        if ($category) {
            $entity->whereHas('definitions', function ($q) use ($category) {
                $q->whereIn('definition_id', [$category->id]);
            });
        }

        $entity = $entity->firstOrFail();

        $socialShares = \Share::currentPage()
            ->facebook()
            ->twitter()
            ->telegram()
            ->linkedin()
            ->whatsapp();

        $templateShare = Template::where('friendly', '=', 'compartir-contenido-promocional')->first();
        $data = Data::where('key', '=', 'global')->first();

        $globalBalance = $this->globalBalance();
        $locations = ModelsLocation::where('enabled', '=', true)->get();

        return view('front.entity', compact('category', 'package', 'entity', 'socialShares', 'templateShare', 'referral', 'data', 'globalBalance', 'locations'));
    }

    private function computePrice($element, $check_for_listing, $referral = null, $dateStart = null, $dateEnd = null)
    {
        $price = null;
        $country = null;
        $clone = null;

        $initialDate = $dateStart ? Carbon::createFromFormat('d/m/Y', $dateStart) : Carbon::now();
        $finalDate = $dateEnd ? Carbon::createFromFormat('d/m/Y', $dateEnd) : Carbon::now();

        if ($position = Location::get()) {
            $countryCode = strtolower($position->countryCode);
            $country = World::getByCode($countryCode);

            $price = (isset($check_for_listing) && $check_for_listing) ?
                Price::where('priceable_id', '=', $element->id)->where('priceable_type', '=', get_class($element))->where('enabled', '=', true)->where('country_code', '=', $countryCode)->where('show_in_listing', '=', true)->whereDate('date_start', $dateStart ? '>=' : '<=', $initialDate)->whereDate('date_end', '>=', $finalDate)->first() :
                Price::where('priceable_id', '=', $element->id)->where('priceable_type', '=', get_class($element))->where('enabled', '=', true)->where('country_code', '=', $countryCode)->whereDate('date_start', $dateStart ? '>=' : '<=', $initialDate)->whereDate('date_end', '>=', $finalDate)->first();

            if ($price == null) {
                $price = $element->prices->filter(function ($item) use ($country, $check_for_listing) {
                    return ((isset($check_for_listing) && $check_for_listing) ? $item->show_in_listing : true) && $item->enabled && (substr($item->country_code, 0, 2) === 'wc') && ($country->parent()->code == substr($item->country_code, 3, 2));
                })->first();
            }

            if ($price == null)
                $price = $element->defaultPrice($initialDate, $finalDate);
        } else {
            $price = $element->defaultPrice($initialDate, $finalDate);
        }

        if ($price)
            $clone = clone $price;

        if ($referral) {
            $content = UserShareContent::where('referral', '=', $referral)
                ->where('shareable_id', '=', $element->id)
                ->where('shareable_type', '=', get_class($element))
                ->first();
            if ($content) {
                $clone = clone $price;
                $price->price += $price->price * ($content->tax / 100);
            }
        }

        //return array('price' => $price, 'currency' => $country ? $country->currency_code : '$');
        return array('price' => $price, 'original' => $clone, 'currency' => ($price && $price->countryOrContinent()) ? $price->countryOrContinent()->currency_code : '$');
    }

    public function price(Request $request)
    {
        $type = $request->get('priceable_type');
        $id = $request->get('priceable_id');

        $element = $type == "Entity" ? Entity::findOrFail($id) : Package::findOrFail($id);
        $country = null;

        $check_for_listing = $request->get('check_for_listing');

        $price_component = $this->computePrice($element, $check_for_listing, $request->get('referral'));

        $html = "";
        if ($price_component['price']) {
            $html = '<span class="highlighted-example-trip__price-value pricing" data-component="pricing" data-type="static">
                        <span class="sticky-cta__text-upper">
                            ' . $price_component['price']->top_line . '
                        </span><br>
                        <span class="pricing__symbol js-symbol">
                            ' . $price_component['currency'] . '
                        </span>
                        <span class="pricing__price js-price" data-default="1300">
                            ' . $price_component['price']->price . '
                        </span><br>
                        <span class="pricing__suffix">
                            ' . $price_component['price']->bottom_line . '
                        </span>
                    </span>';
        }

        $response['html'] = $html;
        $response['price'] = $price_component['price'] ? $price_component['price']->price : 0;

        return $response;
    }

    public function info($friendly)
    {
        $info = Info::where('friendly', '=', $friendly)
            ->where('enabled', '=', true)
            ->firstOrFail();

        return view('front.info', compact('info'));
    }

    public function blog($friendly = null)
    {
        $blog = Blog::where('friendly', '=', $friendly)
            ->where('enabled', '=', true)
            ->firstOrFail();

        $socialShares = \Share::currentPage()
            ->facebook()
            ->twitter()
            ->telegram()
            ->linkedin()
            ->whatsapp();

        return view('front.blog', compact('blog', 'socialShares'));
    }

    public function package(Request $request, $friendly)
    {
        $package = Package::where('friendly', '=', $friendly)
            ->where('enabled', '=', true)
            ->firstOrFail();

        $referral = $request->get('ref');

        $galleryTemplate = Template::where('friendly', '=', 'galeria-imagenes-paquetes')->firstOrFail();
        $textsTemplate = Template::where('friendly', '=', 'textos-complementarios-paquetes')->firstOrFail();
        $templateShare = Template::where('friendly', '=', 'compartir-contenido-promocional')->first();

        $socialShares = \Share::currentPage()
            ->facebook()
            ->twitter()
            ->telegram()
            ->linkedin()
            ->whatsapp();

        $data = Data::where('key', '=', 'phone')->get();

        return view('front.package', compact('package', 'galleryTemplate', 'textsTemplate', 'templateShare', 'referral', 'socialShares', 'data'));
    }

    public function beneficiaryAdd(Request $request)
    {
        $name = $request->get('name');
        $identification = $request->get('identification');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $address = $request->get('address');
        $location = $request->get('location');

        $user = auth()->user();
        $response["result"] = true;
        $response["msg"] = "";

        $prev = Beneficiary::where('identification', '=', $identification)->first();
        if ($prev) {
            $response["result"] = false;
            $response["msg"] = "Ya existe un beneficiario creado con ese número de identificación.";
        } else {
            $beneficiary = Beneficiary::create([
                'user_id' => $user->id,
                'name' => $name,
                'identification' => $identification,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
                'location_id' => $location
            ]);

            Log::create([
                'title' => 'El usuario ' . $user->name . ' ha adicionado un nuevo beneficiario (' . $name . ')',
                'logable_id' => $beneficiary->id,
                'logable_type' => class_basename($beneficiary),
                'user_id' => $user->id
            ]);

            $response["msg"] = "Se ha creado el beneficiario exitosamente.";
            $response['beneficiary_id'] = $beneficiary->id;
        }

        return $response;
    }

    public function book(Request $request)
    {
        $response = array();
        $response['result'] = false;
        $response['total'] = 0;

        $dateStart = $request->get('date_start');
        $dateEnd = $request->get('date_end');

        $modelId = $request->get('modelable_id');
        $modelType = $request->get('modelable_type');
        $modelValue = $request->get('modelable_quantity');

        $parentId = $request->get('parentable_id');
        $parentType = $request->get('parentable_type');

        $operation = $request->get('operation');
        $currentUser = auth()->user();

        $response['auth'] = $currentUser != null;

        $model = null;
        switch ($modelType) {
            case "entity": {
                $model = Entity::where('enabled', '=', true)->where('id', '=', $modelId)->first();
                break;
            }
            case "package": {
                $model = Package::where('enabled', '=', true)->where('id', '=', $modelId)->first();
                break;
            }
            case "category": {
                $model = Category::where('enabled', '=', true)->where('id', '=', $modelId)->first();
                break;
            }
        }

        if ($currentUser && $model) {
            $reservation = Reservation::whereHas('status', function ($q) {
                $q->where('status', '=', 0);
            })->where('user_id', '=', $currentUser->id)->first();

            if ($operation == "add") {
                if (!$reservation) {
                    $reservation = new Reservation();
                    $reservation->user_id = $currentUser->id;
                    $reservation->status()->associate(Status::where('id', '=', 1)->firstOrFail());
                    $reservation->save();

                    Log::create([
                        'title' => 'Se ha creado una nueva solicitud de reserva pendiente por ' . auth()->user()->name,
                        'logable_id' => $reservation->id,
                        'logable_type' => 'App\\Models\\Reservation',
                        'user_id' => auth()->user()->id
                    ]);
                }
            } elseif ($operation == "remove" || $operation == "update") {
                if (!$reservation) goto end;
            }

            $element = ReservationElement::where('reservation_id', '=', $reservation->id)
                ->where('elementable_id', '=', $model->id)
                ->where('elementable_type', '=', get_class($model))->first();

            if ($parentType) $parentType = "App\\Models\\" . str_replace(" ", "", $parentType);

            if (!$element && $operation == "add") {
                $element = new ReservationElement();
                $element->reservation_id = $reservation->id;
                $element->elementable_type = get_class($model);
                $element->elementable_id = $model->id;
                $element->parentable_id = $parentId;
                $element->parentable_type = $parentType;
                $element->quantity = 1;

                if ($request->get('ref')) {
                    $element->referral = $request->get('ref');
                }

                $beneficiary_id = $request->get('beneficiary');
                if ($beneficiary_id) {
                    $beneficiary = Beneficiary::find(intval($beneficiary_id));
                    if ($beneficiary) {
                        $element->content = "Beneficiario: {$beneficiary->name} (CI: {$beneficiary->identification}). Dirección: {$beneficiary->address}. Teléfonos: {$beneficiary->phone}. Correo: {$beneficiary->email}";
                        $element->beneficiary_id = $beneficiary->id;
                    }
                }
            } elseif (!$element && ($operation == "remove" || $operation == "update")) {
                goto end;
            } else {
                switch ($operation) {
                    case "add": {
                            $element->quantity++;

                            $beneficiary_id = $request->get('beneficiary');
                            if ($beneficiary_id) {
                                $beneficiary = Beneficiary::find(intval($beneficiary_id));
                                if ($beneficiary) {
                                    $element->content = "Beneficiario: {$beneficiary->name} (CI: {$beneficiary->identification}). Dirección: {$beneficiary->address}. Teléfonos: {$beneficiary->phone}. Correo: {$beneficiary->email}";
                                    $element->beneficiary_id = $beneficiary->id;
                                }
                            }

                            break;
                        }
                    case "remove": {
                            $element->quantity--;
                            break;
                        }
                    case "update": {
                            $element->quantity = $modelValue;
                        }
                }
            }

            if ($modelType == 'category') {
                $element->price = 0;
            }
            else {
                $price_component = $this->computePrice($model, false, $request->get('ref') ?: $element->referral, $dateStart, $dateEnd);
                if ($price_component['price']) {
                    $element->price = $price_component['price']->price;
                }
                else {
                    $element->price = 0;
                }

                if ($price_component['original']) {
                    $element->priceRelation()->associate($price_component['original']);
                }
            }

            if ($element->quantity > 0) {
                $element->save();
            } else {
                $element->delete();
                if (count($reservation->elements) == 0) {
                    $reservation->delete();
                }
            }

            $response['result'] = true;
            $response['modelQuantity'] = $element->quantity;
            $response['price'] = $element->price;

            $response['total'] = $reservation->elements->sum('quantity');
            $response['totalPrice'] = $reservation->totalPrice();
        }

        end:
        return $response;
    }

    public function cart()
    {
        $template = Template::where('friendly', '=', 'carrito-compras')->firstOrFail();

        if (!auth()->user()->openReservation()) {
            return redirect('/');
        }

        return view('front.cart', compact('template'));
    }

    public function checkout(Request $request)
    {
        $reservation = auth()->user()->openReservation();

        if (!$reservation)
            return redirect('/');

        $reservation_content = $request->get('reservation_content');
        $reservation->content = $reservation_content;

        // $date_start = $request->get('reservation_start');
        // if ($date_start) {
        //     $date_start = Carbon::createFromFormat('d/m/Y', $date_start)->format('Y-m-d');
        //     $reservation->date_start = $date_start;
        // }

        // $date_end = $request->get('reservation_end');
        // if ($date_end) {
        //     $date_end = Carbon::createFromFormat('d/m/Y', $date_end)->format('Y-m-d');
        //     $reservation->date_end = $date_end;
        // }

        foreach ($reservation->elements as $element) {
            $element_content = $request->get('element_content_' . $element->id);
            $element->content = $element_content;

            $element_reservation_start = $request->get('reservation_start_' . $element->id);
            $element_reservation_end = $request->get('reservation_end_' . $element->id);

            if ($element_reservation_start) {
                $element_date_start = Carbon::createFromFormat('d/m/Y', $element_reservation_start)->format('Y-m-d');
                $element->date_start = $element_date_start;
            }

            if ($element_reservation_end) {
                $element_date_end = Carbon::createFromFormat('d/m/Y', $element_reservation_end)->format('Y-m-d');
                $element->date_end = $element_date_end;
            }

            $element->save();
        }

        $reservation->status()->associate(Status::where('status', '=', 1)->firstOrFail());
        $reservation->save();

        //dd("probando3");

        Log::create([
            'title' => 'Se ha enviado una solicitud de reserva por ' . auth()->user()->name,
            'logable_id' => $reservation->id,
            'logable_type' => 'App\\Models\\Reservation',
            'user_id' => auth()->user()->id
        ]);

        try {
            Mail::to($reservation->user->email)->send(new ReservationConfirmationMail([
                "subject" => "Hemos recibido la solicitud de su reservación",
                "user" => $reservation->user,
                "reservation" => $reservation,
                "template" => Template::where('friendly', '=', 'mail-reservacion-confirmacion')->firstOrFail()
            ]));

            Mail::to("alejandro@hametour.com")->send(new ReservationConfirmationMail([
                "subject" => "Se ha enviado una nueva reservación: (Reservación: " . $reservation->id . ")",
                "user" => $reservation->user,
                "reservation" => $reservation,
                "template" => Template::where('friendly', '=', 'mail-reservacion-confirmacion')->firstOrFail()
            ]));

        } catch (Exception $ex) {
        }

        return redirect('/')->with('success', 'Se ha enviado la solicitud exitosamente!');
    }

    public function cancel(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $token_user = User::where('password', '=', $request->get('token'))->where('id', '=', $reservation->user->id)->firstOrFail();

        if (!in_array($reservation->status->status, [0, 1])) {
            return redirect('/')->with('error', 'Se está procesando su reservación por lo que no puede ser cancelada. Contacte con nosotros para cualquier duda.');
        }

        $reservation->delete();

        return redirect('/')->with('success', 'Se ha cancelado su reservación exitosamente!');
    }

    public function location(Request $request)
    {
        $ip = $request->ip();
        if ($position = \Location::get()) {
            echo $position->countryName;
            dd($position);
        } else {
            echo "Can't fetch!";
        }
    }

    public function sync(Request $request)
    {
        $selected_roles = $request->get('selected-roles');

        Auth::user()->roles()->sync($selected_roles);

        return redirect(route('profile.show'))->with('success', 'Se ha actualizado los datos de perfil exitosamente!');
    }

    public function share(Request $request)
    {
        $type = $request->get('shareable_type');
        $id = $request->get('shareable_id');
        $tax = $request->get('tax');

        $element = $type == "Entity" ? Entity::findOrFail($id) : Package::findOrFail($id);

        $content = auth()->user()->shareableContents->where('shareable_type', '=', get_class($element))
            ->where('shareable_id', '=', $id)->first();

        if (!$content) {
            $content = UserShareContent::create([
                'user_id' => auth()->user()->id,
                'shareable_type' => get_class($element),
                'shareable_id' => $id,
                'tax' => $tax,
                'referral' => Str::random(40)
            ]);
        } else {
            $content->tax = $tax;
            $content->save();
        }

        Log::create([
            'title' => 'Se ha comercializado el elemento ' . $element->title . ' con un impuesto de ' . $tax . '% por ' . auth()->user()->name,
            'logable_id' => $element->id,
            'logable_type' => get_class($element),
            'user_id' => auth()->user()->id
        ]);

        return route('front.entity', [
            'friendly' => $element->friendly,
            'ref' => $content->referral
        ]);
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ]);

        $requestData = $request->all();

        $contact = Contact::create($requestData);

        return redirect()->back()->with('success', 'Se ha enviado su petición exitosamente!');
    }

    public function captcha(Request $request)
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }

    public function remittance(Request $request, $id)
    {
        $data = Data::where('key', '=', 'global')->first();
        $element = ReservationElement::findOrFail($id);
        $user = auth()->user();

        if (!$user->hasRole('messenger'))
            return redirect(route('profile.show'))->with('error', 'Operación no permitida!');

        if (($element->messenger == null || $element->messenger->id != $user->id) && in_array($element->elementable->bank_currency, ['USD', 'EUR', 'CUP']))
            return redirect(route('profile.show'))->with('error', 'Usted no es el mensajero propietario de la oferta!');

        if ($request->hasFile('image')) {
            $element->messenger_response_image = $request->file('image')->store('uploads', 'public');
            $element->messenger_response = $request->get('message');
            $element->messenger_response_at = now();
            $element->save();

            Log::create([
                'title' => 'Se ha completado la entrega de la oferta  (' . $element->elementable->title . ') por el mensajero ' . $user->name,
                'logable_id' => $element->elementable->id,
                'logable_type' => class_basename($element->elementable),
                'user_id' => $user->id
            ]);

            try {
                Mail::to($element->reservation->user->email)->send(new ReservationRemittanceMail([
                    "subject" => "El mensajero ha completa la oferta (" . $element->elementable->title . ")",
                    "user" => $element->messenger,
                    "template" => [
                        'title' => "Oferta completada por mensajero",
                        'content' => 'El mensajero <b>' . $element->messenger->name . '</b> ha completado la oferta (' . $element->elementable->title . '). Cualquier queja o sugerencia por favor contacte con nosotros a través del formulario de contacto en nuestro sitio web:
                            <div class="text-center mt-3" style="text-align:center; margin-top: 3rem; display: flex; flex-direction: column; align-items: center;">
                                <div class="profile-photo" style="display:flex; justify-content: center">
                                    <a href="' . url('/') . Storage::url($element->messenger_response_image) . '"><img src="' . url('/') . Storage::url($element->messenger_response_image) . '" width="100" class="img-fluid rounded-circle" alt=""></a>
                                </div>
                                <h3 class="mt-4 mb-3" style="margin-top: 1rem; margin-bottom: 1rem; font-size: 30px; line-height: 30px">' . $element->messenger_response . '</h3>
                                ' . ($data && $data->time_client_to_confirm) ? '<p>Usted dispone de ' . $data->time_client_to_confirm . ' horas para confirmar la entrega o de lo contrario se considerará como entregada.</p>' : '' . '
                            </div>',
                        'action_title' => 'Contactar',
                        'action_url' => route('home')
                    ]
                ]));

                Mail::to($element->banker->email)->send(new ReservationRemittanceMail([
                    "subject" => "El mensajero ha completado la oferta (" . $element->elementable->title . ")",
                    "user" => $element->messenger,
                    "template" => [
                        'title' => "Oferta completada por mensajero",
                        'content' => 'El mensajero <b>' . $element->messenger->name . '</b> ha completado la oferta (' . $element->elementable->title . '). Se ha descontado $' . ($element->price * $element->quantity) . ' de su saldo principal. Espere a ser contactado por nuestros comerciales. Cualquier queja o sugerencia por favor contacte con nosotros a través del formulario de contacto en nuestro sitio web:
                            <div class="text-center mt-3" style="text-align:center; margin-top: 3rem; display: flex; flex-direction: column; align-items: center; ">
                                <div class="profile-photo" style="display:flex; justify-content: center">
                                <a href="' . url('/') . Storage::url($element->messenger_response_image) . '"><img src="' . url('/') . Storage::url($element->messenger_response_image) . '" width="100" class="img-fluid rounded-circle" alt=""></a>
                                </div>
                                <h3 class="mt-4 mb-3" style="margin-top: 1rem; margin-bottom: 1rem; font-size: 30px; line-height: 30px">' . $element->messenger_response . '</h3>
                            </div>',
                        'action_title' => 'Contactar',
                        'action_url' => route('home')
                    ]
                ]));
            } catch (Exception $ex) {
            }

            Transaction::create([
                'currency' => $element->elementable->bank_currency,
                'amount' => $element->elementable->bank_delivery_amount * $element->quantity,
                'type' => 'out',
                'user_id' => $element->banker->id
            ]);

            return redirect(route('profile.show') . "#remittances")->with('success', 'Se ha completado la oferta, espere a ser contactado por nuestros comerciales!');
        } else {
            return redirect(route('profile.show') . "#remittances")->with('error', 'Debe especificar la imagen de una foto a un documento de identidad!');
        }


        dd($request->get('image'));
    }

    public function confirm($id)
    {
        $element = ReservationElement::findOrFail($id);
        $user = auth()->user();

        if ($element->reservation->user->id != $user->id) {
            return redirect(route('profile.show'))->with('error', 'Operación no permitida. Usted no es el propietario de la reservación!');
        }

        if ($element->messenger_response_at == null || $element->client_confirmation_at != null) {
            return redirect(route('profile.show'))->with('error', 'Operación no permitida.!');
        }

        $element->client_confirmation_at = now();
        $element->save();

        Log::create([
            'title' => 'Se ha confirmado el elemento ' . $element->title . ' por el cliente ' . auth()->user()->name,
            'logable_id' => $element->id,
            'logable_type' => get_class($element),
            'user_id' => auth()->user()->id
        ]);

        return redirect(route('profile.show'))->with('success', 'Se ha confirmado el elemento exitosamente.!');
    }

    private function globalBalance()
    {
        $txs = Transaction::all()->groupBy('currency');
        $transactions = array();
        foreach ($txs as $key => $value) {
            $sum =  $value->sum(function ($s) {
                return $s->type == 'in' ? $s->amount : - ($s->amount);
            });

            $elem['key'] = $key;
            $elem['value'] = $sum;
            $transactions[] = $elem;
        }

        return $transactions;
    }
}
