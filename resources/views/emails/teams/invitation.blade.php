@component('mail::message')

<p>Olá você está sendo convidado para fazer parte um novo time.</p>
<p>Para aceitar o convite clique no link abaixo.</p>

@php
    $parameters = "?email={$email}";
@endphp
@component('mail::button', ['url' => url('accept-invitation', [$team_id]) . $parameters])
Aceitar
@endcomponent

<p>Nos vemos lá</p>

@endcomponent