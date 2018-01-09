<div class="alert {{ Session::get('alert-class') }}">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    {{ Session::get('message')}}
</div>
