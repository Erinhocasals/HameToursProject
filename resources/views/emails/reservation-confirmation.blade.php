<html>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #40c8d9;">
    <thead>
      <tr>
        <th style="text-align:left;"><a href="{{ route('home') }}"><img style="max-width: 150px;" src="{{ asset('front-template/assets/img/logo.png') }}" alt="HameTours"></a></th>
        <th style="text-align:right;font-weight:400;">{{ date('j F, Y', strtotime($data['reservation']->created_at)) }}</th>
      </tr>
    </thead>
    <tbody>
        <tr><td>{{ $data['template']->title }}</td></tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Estado</span><b style="color:#f88c00;font-weight:normal;margin:0">{{ $data['reservation']->status->title }}</b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">ID</span> {{ $data['reservation']->id }}</p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Total</span> {{ $data['reservation']->totalElements() }} </p>
        </td>
      </tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Nombre</span> {{ $data['reservation']->user->name }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Correo</span> {{ $data['reservation']->user->email }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Teléfono</span> {{ $data['reservation']->user->phone }}</p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Fecha Inicio</span> {{ date('j F, Y', strtotime($data['reservation']->date_start)) }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Fecha Fin</span> {{ date('j F, Y', strtotime($data['reservation']->date_end)) }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Descripción General</span> {!! $data['reservation']->content !!}</p>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Elementos</td>
      </tr>
      <tr>
        <td colspan="2" style="padding:15px;">
            @foreach ($data['reservation']->elements as $element)
                <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                    <span style="display:block;font-size:13px;font-weight:normal;">{!! $element->elementable->title !!}</span> @if ($element->parentable) {{ $element->parentable->title }} @endif <b style="font-size:12px;font-weight:300;"> /x{{ $element->quantity }} @if ($element->date_start) /{{ date('j F, Y', strtotime($element->date_start)) }} @endif @if ($element->date_end) /{{ date('j F, Y', strtotime($element->date_end)) }} @endif</b>
                </p>
            @endforeach
        </td>
      </tr>
    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">Gracias</strong> {!! $data['template']->content !!}<br><br>
          <p><a href="{{ route('front.cancel', ['id' => $data['reservation']->id, 'token' => $data['reservation']->user->password]) }}" style="color: #40c8d9">Puede cancelar su reservación haciendo clic sobre este vínculo</a> </p>
          {{-- <b>Email:</b> contact@bachanatours.in --}}
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>
