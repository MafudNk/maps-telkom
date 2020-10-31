@if(session()->has('flash_notification.message'))
	<div class="alert alert-{{session()->get('flash_notification.level')}}">
	<button type="button" class="close" data-dismiss="alert" arial-hidden="true">&times;</button>
	{!! session()->get('flash_notification.message') !!}
	</div>
@endif