<li>
  {!! Html::image(asset('images/logo.png'), null, ['width'=>300]) !!}
</li>
<li> {{ link_to('users', 'Users', ['class'=>'waves']) }}</li>
<li> {{ link_to('locations', 'Locations', ['class'=>'waves']) }}</li>
<li> {{ link_to('records', 'Records', ['class'=>'waves']) }}</li>
<li> {{ link_to('cheques', 'Checks', ['class'=>'waves']) }}</li>
<li> {{ link_to('reciepts', 'Reciepts', ['class'=>'waves']) }}</li>
<li> {{ link_to('payment_modes', 'Payment Modes', ['class'=>'waves']) }}</li>

 