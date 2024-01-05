{{-- @component('mail::message')
Hola, {{ $data['user']->name }}

{!! $data['template']->content !!}

@component('mail::button', ['url' => ''])
Ver su orden
@endcomponent

@component('mail::button', ['url' => "/"])
Visitar nuestro sitio
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}

<html>
  <head>
    <title>
    </title>
  </head>
  <body style="font-family: Helvetica, Arial, sans-serif; color: rgb(103, 103, 103); width: 100%; margin: 0px; cursor: auto;background-color: #ededf2;" class="ui-sortable">
    <div data-section-wrapper="1" style="width:100%;background-color: #ededf2;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: #777777;text-align: center;line-height: 21px;padding: 20px 0 30px;" class="content-padding">
      <center>
        <table data-section="1" cellspacing="0" cellpadding="0" width="600" class="w320" style="border-collapse: collapse;">
          <tbody>
            <tr>
              <td class="header-lg" data-slot-container="1" style="font-family: Helvetica, Arial, sans-serif;font-size: 32px;color: #4d4d4d;text-align: center;line-height: normal;border-collapse: collapse;font-weight: 700;padding: 35px 0 0;">
                <div data-slot="text" data-param-undefined="">
                </div>
              </td>
            </tr>
            <tr>
              <td class="free-text" data-slot-container="1" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: #777777;text-align: center;line-height: 21px;border-collapse: collapse;padding: 10px 60px 0px 60px;width: 100%;">
                <div data-slot="text">
                  <img src="{{ asset('front-template/assets/img/logo.png') }}" width="200" height="auto" alt="asistent.medifit.si" />
                </div>
              </td>
            </tr>
            <tr>
              <td class="mini-block-container" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: #777777;text-align: center;line-height: 21px;border-collapse: collapse;padding: 30px 50px;width: 500px;">
                <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate;">
                  <tbody>
                    <tr>
                      <td class="mini-block" data-slot-container="1" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: #777777;text-align: center;line-height: 21px;border-collapse: collapse;background-color: #ffffff;width: 498px;border: 1px solid #cccccc;border-radius: 5px;padding: 45px 75px;">
                        <div class="user-msg-title" data-slot="text" style="padding: 0px 0px;font-size: 24px;text-align: left;color: #ff8c00; font-weight: bold">
                          <p>
                              {!! $data['template']->title !!}
                          </p>
                        </div>
                         <div class="user-msg" data-slot="text" style="padding: 10px 0px; font-size: 14px; text-align: left; color: #000000; line-height: 21px;">
                            {!! $data['template']->content !!}
                        </div>
                        <div class="button" data-slot="button" data-param-padding-top="5" data-param-button-size="1" data-param-link-text="I want this" data-param-href="#povezava#" data-param-float="1" data-param-background-color="#fdb737" data-param-color="ffffff">
                          <table cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="center" width="400" height="40" bgcolor="#00c8d9" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; bord-radius: 5px; color: #FFFFFF; display: block;">
                                <a href="{{ route('login') }}" style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">
                                  <span style="color: #FFFFFF">Ver la reservación &nbsp;&nbsp;&nbsp;>
                                  </span>
                                </a>
                              </td>
                            </tr>
                          </table>
                          <div style="clear:both">
                          </div>
                        </div>
                        <div class="user-msg" data-slot="text" style="padding: 10px 0px;font-size: 14px;text-align: left;color:#000000">
                          <b>Nuevo estado:</b> {{ $data['reservation']->status->title }} <br>
                          <b>Respuesta:</b> {!! $data['reservation']->response !!}
                          <br /><br /> <br />
                          <p>{!! $data['template']->subtitle !!}</p>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </center>
    </div>
    <div data-section-wrapper="1" style="width:100%; background-color: #ededf2;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: #777777;text-align: center;line-height: 21px;">
      <center>
        <table data-section="1" cellspacing="0" cellpadding="0" width="600" class="w320" style="border-collapse: collapse;">
          <tbody>
            <tr>
              <td style="padding: 25px 0 25px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: #777777;text-align: center;line-height: 21px;border-collapse: collapse;" data-slot-container="1">
                <div data-slot="text">
                  <strong>2021 HameTours </strong> Todos los derechos reservados
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </center>
    </div>
  </body>
</html>
