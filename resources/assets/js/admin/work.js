(function ($) {
    $(function () {
        var $body = $('body');
        $('textarea').summernote({
            height: 300,
            minHeight: null,
            maxHeight: null,             // set maximum height of editor
            focus: true,
        });
        $body.on('change', 'input.main-image', function (e) {
            var $thumb_src,
                $this = $(this);

            $thumb_src = window.URL.createObjectURL( $this.prop('files')[0] );
            if(+$this.next('img').length){
                $this.next('img').remove();
            }

            $img = $('<img/>',{
                'src': $thumb_src,
                'class': 'd-block w-100 mt-2',
            });

            $this.after($img)
        });


        $body.on('change', '.work-example input',function (e) {
            var $thumb_src,
                $this = $(this);

            _.each($this.prop('files'), function ( file ) {
                $thumb_src = window.URL.createObjectURL( file );
                $img = $('<img/>',{
                    'src': $thumb_src,
                    'class': 'd-block w-100',
                });

                $body.find('.example-thumbs').append($('<div/>',{
                    'class': 'col-3 card mb-1 p-1 tmp'
                }).append($img));
                $this.closest('.wrapper-examples').find('.remove-examples').removeClass('d-none');
            });

            $clone_label = $this.closest('label').clone();
            $this.closest('label').addClass('d-none');
            $clone_label.find('input').val("");
            $this.closest('.row').find('.remove-examples').before($clone_label);

        });
        $body.on('click', '.remove-examples', function (e) {
            e.preventDefault();
            var $first_label;
            if(confirm('Удалить все новые примеры?')){
                if(+ $body.find('.example-thumbs .card.tmp').length){
                    $body.find('.example-thumbs .card.tmp').remove();
                    $first_label = $body.find('.work-example').first();
                    $first_label.find('input').val("");
                    $first_label.removeClass('d-none');
                    $body.find('.work-example').remove();
                    $body.find('.add-work .remove-examples').before($first_label);
                    $(this).addClass('d-none');
                }
            }
        });
        //$('#types_work').DataTable();
        $body.on('click', '.remove-work', function () {
            if(confirm('Точно удалить?')){
                return true
            } else {
                return false
            }
        });

        $body.on('click', '.remove-example', function (e) {
            e.preventDefault();
            var $this = $(this),
                remove_route = $this.data('remove_route'),
                _token = $body.find('input[name="_token"]').val();
            if(+$this.next('.remove-spinner').find('i').length){
                $this.next('.remove-spinner').find('i').remove();
            }
            if(confirm('Удалить ?')){
                $this.next('.remove-spinner').append($('<i/>', {
                    'class' : 'fa fa-spinner fa-pulse fa-3x fa-fw'
                }));

                $.ajax(remove_route, {
                    type: 'delete',
                    data: {
                        '_token': _token
                    }
                })
                    .done(function (data) {
                        $this.closest('.example').fadeOut();

                        setTimeout(function () {
                            if($('.exist-examples').find('.example').length === 1){
                                $('.exist-examples').remove();
                            } else {
                                $this.closest('.example').remove();
                            }
                        }, 400)
                    })
                    .always(function () {
                        if (+$this.next('.remove-spinner').find('i').length) {
                            $this.next('.remove-spinner').find('i').remove();
                        }
                    })
            }

        })
    })
})(window.jQuery);