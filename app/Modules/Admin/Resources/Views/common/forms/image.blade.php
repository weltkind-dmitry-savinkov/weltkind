@push('js')
<script>
    $(document).ready(function () {
        $(document).on('click', '.timeline-body a.btn-danger', function (event) {
            if (confirm('Удалить изображение?')) {
                $.ajax({
                    url: $(this).attr('data-href'),
                    type: 'DELETE',  // user.destroy
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    success: function (result) {
                        location.reload();
                        return false;
                    }
                });
                return false;
            }
            else {
                return false;
            }
        });
    });
</script>
@endpush

<div class="images-list">

    {!! BootForm::label('Изображение') !!}
    <div class="clearfix"></div>

    @if ($entity->$field)
    <div class="timeline-body">

        @if ($entity->image_full)
            <a href="{!!$entity->image_full !!}" rel="ajax"><img src="{!! $entity->image_mini?:$entity->image_thumb !!}"></a>
        @else
            <img src="{!! $entity->image_mini?:$entity->image_thumb !!}">
        @endif

        <a class="btn btn-danger"
                data-href="{!! URL::route($routePrefix.'delete-upload', ['id'=>$entity, 'field'=>$field])  !!}">
            <i class="glyphicon glyphicon-trash"></i>
        </a>
    </div>
    @else
    {!! Form::file($field) !!}
    @endif
</div>