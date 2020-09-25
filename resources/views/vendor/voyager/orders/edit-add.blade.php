@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if($edit)
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                            @endphp

                            @foreach($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $display_options = $row->details->display ?? NULL;
                                    if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                @if (isset($row->details->legend) && isset($row->details->legend->text))
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                @endif

                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if (isset($row->details->view))
                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
                                    @elseif ($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        @if($row->field == 'order_detail')
                                            <div class="row">
                                                <div class="col-md-2" style="margin-bottom  : 10px">
                                                    <div class="form-group">
                                                        <label for="Jumlah Titik Bordir">Jumlah Titik Bordir</label>
                                                        <input class="form-control" type="text" name="order_detail[embroidery_point]" value="{{ $edit ? $dataTypeContent->{$row->field}->embroidery_point : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-bottom  : 10px">
                                                    <div class="form-group">
                                                        <label for="Catatan Bordir">Catatan Bordir</label>
                                                        <input class="form-control" type="text" name="order_detail[embroidery_notes]" value="{{ $edit ? $dataTypeContent->{$row->field}->embroidery_notes : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-bottom  : 10px">
                                                    <div class="form-group">
                                                        <label for="Jenis Sablon">Jenis Sablon</label>
                                                        <select name="order_detail[screen_printing]" class="form-control select2">
                                                            @foreach ($screenPrintings as $screenPrinting)
                                                                <option value="{{ $screenPrinting->code }}" {{ $edit && $screenPrinting->code == $dataTypeContent->{$row->field}->screen_printing ? 'selected' : '' }} >{{ $screenPrinting->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-bottom  : 10px">
                                                    <div class="form-group">
                                                        <label for="Catatan Sablon">Catatan Sablon</label>
                                                        <input class="form-control" type="text" name="order_detail[screen_printing_notes]" value="{{ $edit ? $dataTypeContent->{$row->field}->screen_printing_notes : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-bottom  : 10px">
                                                    <div class="form-group">
                                                        <label for="Kancing">Kancing</label>
                                                        <select name="order_detail[button]" class="form-control select2">
                                                            @foreach ($buttons as $button)
                                                                <option value="{{ $button->code }}" {{ $edit && $button->code == $dataTypeContent->{$row->field}->button ? 'selected' : '' }} >{{ $button->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-bottom  : 10px">
                                                    <div class="form-group">
                                                        <label for="Menggunakan Perepet">Perepet</label>
                                                        <select name="order_detail[use_perepet]" class="form-control">
                                                            <option value="0" {{ $edit && $dataTypeContent->{$row->field}->use_perepet == 0 ? 'selected' : '' }} >Tidak</option>
                                                            <option value="1" {{ $edit && $dataTypeContent->{$row->field}->use_perepet == 1 ? 'selected' : '' }} >Ya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-bottom  : 10px">
                                                    <div class="form-group">
                                                        <label for="Tali Kur">Tali Kur</label>
                                                        <select name="order_detail[kur_rope]" class="form-control select2">
                                                            @foreach ($kurRopes as $kurRope)
                                                                <option value="{{ $kurRope->code }}" {{ $edit && $kurRope->code == $dataTypeContent->{$row->field}->kur_rope ? 'selected' : '' }} >{{ $kurRope->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-bottom  : 10px">
                                                    <div class="form-group">
                                                        <label for="Stoper">Stoper</label>
                                                        <select name="order_detail[stopper]" class="form-control select2">
                                                            @foreach ($stoppers as $stopper)
                                                                <option value="{{ $stopper->code }}" {{ $edit && $stopper->code == $dataTypeContent->{$row->field}->stopper ? 'selected' : '' }} >{{ $stopper->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-bottom  : 10px">
                                                    <div class="form-group">
                                                        <label for="Resleting">Resleting</label>
                                                        <select name="order_detail[zipper]" class="form-control select2">
                                                            @foreach ($zippers as $zipper)
                                                                <option value="{{ $zipper->code }}" {{ $edit && $zipper->code == $dataTypeContent->{$row->field}->zipper ? 'selected' : '' }} >{{ $zipper->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-bottom  : 10px">
                                                    <div class="form-group">
                                                        <label for="Puring">Puring</label>
                                                        <select name="order_detail[puring]" class="form-control select2">
                                                            @foreach ($purings as $puring)
                                                                <option value="{{ $puring->code }}" {{ $edit && $puring->code == $dataTypeContent->{$row->field}->puring ? 'selected' : '' }} >{{ $puring->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($row->field == 'detail')
                                            @php
                                                $detail = new stdClass();
                                                $detail->size = '';
                                                $detail->type = '';
                                                $detail->quantity = '';

                                                $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field} ?? [$detail];
                                            @endphp
                                            @foreach ($dataTypeContent->{$row->field} as $k => $item)
                                                <div class="detail">
                                                    <div class="row">
                                                        <div class="col-md-2" style="margin-bottom: 10px">
                                                            <div class="form-group">
                                                                <label for="Ukuran">Ukuran</label>
                                                                <select class="form-control" name="detail[{{ $k }}][size]">
                                                                    <option value="XS" {{ $item->size == 'XS' ? 'selected' : '' }}>XS</option>
                                                                    <option value="S" {{ $item->size == 'S' ? 'selected' : '' }}>S</option>
                                                                    <option value="M" {{ $item->size == 'M' ? 'selected' : '' }}>M</option>
                                                                    <option value="L" {{ $item->size == 'L' ? 'selected' : '' }}>L</option>
                                                                    <option value="XL" {{ $item->size == 'XL' ? 'selected' : '' }}>XL</option>
                                                                    <option value="2XL" {{ $item->size == '2XL' ? 'selected' : '' }}>2XL</option>
                                                                    <option value="3XL" {{ $item->size == '3XL' ? 'selected' : '' }}>3XL</option>
                                                                    <option value="4XL" {{ $item->size == '4XL' ? 'selected' : '' }}>4XL</option>
                                                                    <option value="5XL" {{ $item->size == '5XL' ? 'selected' : '' }}>5XL</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2" style="margin-bottom: 10px">
                                                            <div class="form-group">
                                                                <label for="Jenis Lengan">Jenis Lengan</label>
                                                                <select class="form-control" name="detail[{{ $k }}][type]">
                                                                    <option value="Lengan Panjang" {{ $item->type == 'Lengan Panjang' ? 'selected' : '' }}>Lengan Panjang</option>
                                                                    <option value="Lengan Pendek" {{ $item->type == 'Lengan Pendek' ? 'selected' : '' }}>Lengan Pendek</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2" style="margin-bottom: 10px">
                                                            <div class="form-group">
                                                                <label for="Jumlah">Jumlah</label>
                                                                <input type="number" class="form-control" name="detail[{{ $k }}][quantity]" value="{{ $item->quantity }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1" style="margin-bottom: 10px">
                                                            <div class="form-group">
                                                                <label for="Aksi">Aksi</label>
                                                                <button class="btn btn-danger delete-detail" style="margin: 0">- Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-success add-detail">+ Tambah</button>
                                                </div>
                                            </div>
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif
                                    
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                    @if ($errors->has($row->field))
                                        @foreach ($errors->get($row->field) as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        function getOrder(endpoint) {
            $.get(endpoint, function(data) {
                $("input[name='name']").val(data.name)
                $("input[name='institution']").val(data.institution)
                $("input[name='address']").val(data.address)
                $("input[name='phone_number']").val(data.phone_number)
                
                if (data.order_status.toLowerCase() == 'full_order') {
                    $("input[name='order_status']").val('Full Order')
                } else if (data.order_status.toLowerCase() == 'makloon') {
                    $("input[name='order_status']").val('Makloon')
                } else {
                    $("input[name='order_status']").val(data.order_status)
                }

                $("input[name='enter_date']").val(data.order_time)
                $("input[name='exit_date']").val(data.completed_time)

                $('.order-detail').empty()

                for (let [index, item] of data.detail.entries()) {
                    $('.order-detail').append(`
                        <div class='row'>
                            <div class='col-md-2' style='margin-bottom: 10px'>
                                <div class='form-group'>
                                    <label for="Nama Barang">Nama Barang</label>
                                    <input class='form-control' name="detail[${index}][type]" value='${data.type}'">
                                </div>
                            </div>
                            <div class='col-md-2' style='margin-bottom: 10px'>
                                <div class='form-group'>
                                    <label for="Bahan">Bahan</label>
                                    <input class='form-control' name="detail[${index}][material]" value='${data.material}'">
                                </div>
                            </div>
                            <div class='col-md-2' style='margin-bottom: 10px'>
                                <div class='form-group'>
                                    <label for="Jenis Lengan">Jenis Lengan</label>
                                    <input class='form-control' name="detail[${index}][sleeve]" value='${item.type}'">
                                </div>
                            </div>
                            <div class='col-md-2' style='margin-bottom: 10px'>
                                <div class='form-group'>
                                    <label for="Ukuran">Ukuran</label>
                                    <input class='form-control' name="detail[${index}][size]" value='${item.size}'">
                                </div>
                            </div>
                            <div class='col-md-2' style='margin-bottom: 10px'>
                                <div class='form-group'>
                                    <label for="Jumlah">Jumlah</label>
                                    <input class='form-control' name="detail[${index}][quantity]" value='${item.quantity}'">
                                </div>
                            </div>
                            <div class='col-md-2' style='margin-bottom: 10px'>
                                <div class='form-group'>
                                    <label for="Harga">Harga</label>
                                    <input class='form-control' name="detail[${index}][price]">
                                </div>
                            </div>
                        </div>
                    `)
                }
            })
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();

            var orderDetailRoute = {!! json_encode(route('voyager.orders.show.json', ':id')) !!}

            $('select.select2-ajax').eq(0).on('change', function() {
                var orderId = $(this).val()
                var orderDetailRoute = {!! json_encode(route('voyager.orders.show.json', ':id')) !!}
                orderDetailRoute = orderDetailRoute.replace(':id', orderId)

                getOrder(orderDetailRoute)
            })

            $(document).on('click', 'button.add-detail', function(event) {
                event.preventDefault();
                
                const length = $('div.detail div.row').length

                $('div.detail').last().append(`
                    <div class="row">
                        <div class="col-md-2" style="margin-bottom: 10px">
                            <div class="form-group">
                                <label for="Ukuran">Ukuran</label>
                                <select class="form-control" name="detail[${length}][size]">
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="2XL">2XL</option>
                                    <option value="3XL">3XL</option>
                                    <option value="4XL">4XL</option>
                                    <option value="5XL">5XL</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-bottom: 10px">
                            <div class="form-group">
                                <label for="Jenis Lengan">Jenis Lengan</label>
                                <select class="form-control" name="detail[${length}][type]">
                                    <option value="Lengan Panjang">Lengan Panjang</option>
                                    <option value="Lengan Pendek">Lengan Pendek</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-bottom: 10px">
                            <div class="form-group">
                                <label for="Jumlah">Jumlah</label>
                                <input type="number" class="form-control" name="detail[${length}][quantity]">
                            </div>
                        </div>
                        <div class="col-md-1" style="margin-bottom: 10px">
                            <div class="form-group">
                                <label for="Aksi">Aksi</label>
                                <button class="btn btn-danger delete-detail" style="margin: 0">- Hapus</button>
                            </div>
                        </div>
                    </div>
                `)
            })

            $(document).on('click', 'button.delete-detail', function(event) {
                event.preventDefault();

                $(this).parent().parent().parent().remove()
            })
        });
    </script>
@stop
