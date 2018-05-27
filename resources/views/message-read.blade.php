<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset("plugins/images/whistle.jpg") }}">
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Read Message</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
      <tbody>
        <tr>
          <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="http://eliteadmin.themedesigner.in" target="_blank"><img src="{{ URL::asset("plugins/images/whistle.jpg") }}" alt="Whistle Blower kit" style="border:none" class="img-responsive" height="40"><br/>
        </tr>
      </tbody>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
      <tbody>
        <tr>
          <td style="background:#fb9678; padding:20px; color:#fff; text-align:center;">{{$message->subject}}</td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td><p>From: {{$message->from}}</p>
              <p>{!! $message->text !!}</p>
              <center>
                @if(Auth::user()->role == "admin")
                  <a href="{{url("admin/tip/messages/new")}}" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #00c0c8; border-radius: 60px; text-decoration:none;">Go Back</a>
                @elseif(Auth::user()->role == "regular")
                  <a href="{{url("/tip/messages/new")}}" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #00c0c8; border-radius: 60px; text-decoration:none;">Go Back</a>
                @endif
              </center>
              <b>- Thanks (Whistle-Blower team)</b> </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- <div>{{$message->text}}</div> -->
    <!-- <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
      <p> Powered by Themedesigner.in <br>
        <a href="javascript: void(0);" style="color: #b2b2b5; text-decoration: underline;">Unsubscribe</a> </p>
    </div> -->
  </div>
</div>
</body>
</html>
