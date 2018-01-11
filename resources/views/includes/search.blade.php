
{!! Form::open(['url'=> LaravelLocalization::getLocalizedURL(null, '/search', [], true), 'class'=>'form-inline my-2 my-lg-0', 'method' => 'get', 'id' => 'search-form'] ) !!}
        {{ csrf_field() }}
    <div class="input-append spancustom">
        {!! Form::text('search_text', null, ['class'=>'form-control mr-sm-2','id' => 'search_text', 'maxlength' => 60,'minlength' => 1,'required']) !!}
        {!! Form::submit(Lang::get('sidebar.search'), array('class' => 'btn btn-primary my-2 my-sm-0')) !!}
    </div>
    {!! Form::close() !!}


<script>
   $(document).ready(function() {
    src = "{{ route('searchajax') }}";
     $("#search_text").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    response(data);
                   
                }
            });
        },
        minLength: 3,
       
    });
});
</script>