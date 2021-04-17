@component('mail::message')

<p>Olá você está sendo convidado para fazer parte um novo time.</p>
<p>Para aceitar o convite clique no link abaixo.</p>

@component('mail::button', ['url' => url('accept-team')])
Aceitar
@endcomponent

<p>Nos vemos lá</p>

@endcomponent