@component('mail::message')
 Hello {{$user->name}}

 This is to inform you that you have requested to reset your password.

@component('mail::button', ['url' => url('reset',$user->remember_token)])
Reset Password
@endcomponent

Thanks <br>
{{config('app.name')}}
@endcomponent