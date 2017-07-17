@extends('layouts.admin')
@section('content')
    <div class="row list_222">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
            <div class="cms_module_list module_list_1">
                <h3 class="menuText f-s-17">
                    <span class="module_icon_main"></span>

                    <span class="module_icon_main_text">
                        {!! Form::select('styles',['fonts'=>'Fonts','icons'=>'Icons','editors'=>'Editors'],$type,['class' => 'form-control select-type']) !!}
                    </span>
                </h3>
                <hr>
                <ul class="list-unstyled menuList" id="components-list">
                    @if(count($assets))
                        @foreach($assets as $asset)
                            @if($currentAsset)
                                @if($currentAsset->slug == $asset->slug)
                                    <li class="active">
                                @else
                                    <li class="">
                                @endif
                            @else
                                @if($assets[0]->slug == $asset->slug)
                                    <li class="active">
                                @else
                                    <li class="">
                                @endif
                            @endif
                                <a href="?p={!! $asset->slug !!}{!! ($type)? "&type=".$type : "" !!}"  rel="unit" data-slug="{{ $asset->slug }}" class="tpl-left-items">
                                    <span class="module_icon"></span> {{ $asset->title }}
                                </a>
                            </li>
                        @endforeach
                    @else
                        No Assets
                    @endif
                </ul>
            </div>
        </div>
        {!! HTML::image('resources/assets/images/ajax-loader5.gif', 'a picture', array('class' => 'thumb img-loader hide')) !!}
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
            <div class="tpl-list">
                <div class="row template-search">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 template-search-box m-t-10 m-b-10">
                        <form class="form-horizontal">
                            <div class="form-group m-b-0  ">
                                <label for="inputEmail3" class="control-label text-left"><i
                                            class="fa fa-sort-amount-desc"></i> Sort By</label>

                                <select profile-id="11" data-sub="false" data-type="main-container"
                                        class="form-control sort-items selectpicker" data-style="selectCatMenu"
                                        name="sort" data-width="50%">
                                    <option value="" selected="selected">Order By</option>
                                    <option value="created_at.asc">Recently Added</option>
                                    <option value="created_at.desc">Old Added</option>
                                    <option value="name.asc">Name by asc</option>
                                    <option value="name.desc">Name by desc</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 p-l-0 p-r-0">
                        <div class="template-upload-button clearfix">
                            <div class="rightButtons">
                                <div class="btn-group listType">
                                    <a href="#" class="btn btnListView"><i class="fa fa fa-th-list"></i></a>
                                    <a href="#" class="btn btnGridView active"><i class="fa fa-th-large"></i></a>
                                </div>
                                <a class="btn btn-default searchBtn"><i class="fa fa-search "
                                                                        aria-hidden="true"></i></a>
                            </div>

                            <ul class="editIcons list-unstyled ">
                                <li><a href="#" class="btn trashBtn"><i class="fa fa-trash-o"></i></a></li>
                                <li><a href="#" class="btn copyBtn"><i class="fa fa-clone"></i></a></li>
                                <li ><a href="#" class="btn editBtn" ><i class="fa fa-pencil"></i></a></li>
                            </ul>
                            <button class="btn btn-sm pull-right btnUploadWidgets" type="button" data-toggle="modal"
                                    data-target="#myModal">
                                <i class="glyphicon glyphicon-plus module_upload_icon"></i> <span
                                        class="upload_module_text">Add New</span>
                            </button>
                            @if($p=='google')
                                <button class="btn btn-sm pull-right btnUploadWidgets" type="button" data-toggle="modal"
                                        data-target="#google-modal">
                                    <i class="fa fa-google module_upload_icon"></i> <span
                                            class="upload_module_text"></span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row template-search top_div_sort_41 hide">
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 template-search-box m-t-10 m-b-10">
                        <form class="form-horizontal form_sort_31">
                            <div class="form-group m-b-0">
                                <label for="inputEmail3" class="col-xs-12 col-sm-2 control-label"
                                       style="font-weight: bold;">Sort
                                    By</label>
                                <div class="col-sm-5">


                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 for_icons_17">
                        <a class="pull-right for_search_17">
                            <i class="fa fa-search f-s-15" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="container_main">
                    {{--@if($data)--}}
                    {{--@foreach($data as $item)--}}
                    {{--<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">--}}
                    {{--<div class="main_div_1">--}}
                    {{--<div class="top_part_1">{!! $item['css'] !!}</div>--}}
                    {{--<div class="bottom_part_1"><a href="#"><span>{!! $item['classname'] !!}</span> ---}}
                    {{--style 001</a></div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                    <div class="templates-list  m-t-20 m-b-10">

                        @if(View::exists("framework::framework_assets.extra.$type"))
                            @include("framework::framework_assets.extra.$type")
                        @endif
                        <div class="row templates m-b-10">

                            <div class="modal fade fullscreenModal" id="myModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            {{--@if($p)--}}
                                            {{--<input type="text" data-role="classname"--}}
                                            {{--class="modal-title studioNameInput" id="name" name="title"--}}
                                            {{--data-studiname="gradientcolor" value="nameofclass">--}}
                                            {{--@else--}}
                                            {{--<h5 class="	modal-title" id="exampleModalLabel"> {!!$type!!}   </h5>--}}
                                            {{--@endif--}}

                                            <div class="pull-right">
                                                <button class="save_item" data-savestudio="{!!'p'!!}"><i
                                                            class="fa fa-check" aria-hidden="true"></i>Save
                                                </button>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<input type="hidden" data-action="type" value="{!! $type !!}">--}}
    {{--<input type="hidden" data-action="sub" value="{!! $p !!}">--}}
    <!-- Modal -->
    <div class="modal fade" id="varModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span data-existmodal="name"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" data-existmodal="listing">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="#" class="thumbBox">
                                <img src="{!! Html::image('app/Modules/Framework/Resources/Views/assets/framework/img/placeholder-img.jpg') !!}" alt="">
                                <h4>Variation 0001</h4></a>
                        </div>

                        <div class="col-sm-4">
                            <a href="#" class="thumbBox">
                                <img src="{!! Html::image('app/Modules/Framework/Resources/Views/assets/framework/img/placeholder-img.jpg') !!}" alt="">
                                <h4>Variation 0001</h4></a>
                        </div>

                        <div class="col-sm-4">
                            <a href="#" class="thumbBox">
                                <img src="{!! Html::image('app/Modules/Framework/Resources/Views/assets/framework/img/placeholder-img.jpg') !!}" alt="">
                                <h4>Variation 0001</h4></a>
                        </div>

                        <div class="col-sm-4">
                            <a href="#" class="thumbBox">
                                <img src="{!! Html::image('app/Modules/Framework/Resources/Views/assets/framework/img/placeholder-img.jpg') !!}" alt="">
                                <h4>Variation 0001</h4></a>
                        </div>

                        <div class="col-sm-4">
                            <a href="#" class="thumbBox">
                                <img src="{!! Html::image('app/Modules/Framework/Resources/Views/assets/framework/img/placeholder-img.jpg') !!}" alt="">
                                <h4>Variation 0001</h4></a>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <style id="savedcss" data-role="savedcss">
    </style>
    <script type="template" data-template="listingitem">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="main_div_1" data-toolaction="selected" data-classname="{name}">
                <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family={name}" />
                <div class="top_part_1" style="font-size:24px; font-family:{name},  Helvetica, Arial,' sans-serif' ;">{name}</div>
                <div class="bottom_part_1">
                    <a href="#"><span>{name}</span></a>
                </div>
            </div>
        </div>
    </script>

    @include('resources::assests.deleteModal',['title'=>'Delete Style'])
    @if($p=='google')
    @include('framework::framework_assets.google_api')
    @endif
@stop
@section('CSS')
    {!! HTML::style('app/Modules/Resources/Resources/assets/css/new-store.css') !!}
    {!! HTML::style('app/Modules/Resources/Resources/assets/css/style_cube.css') !!}
    {!! HTML::style('/resources/assets/js/bootstrap-select/css/bootstrap-select.min.css') !!}
    {!! HTML::style('/resources/assets/js/animate/css/animate.css') !!}
    {!! HTML::style('app/Modules/Framework/Resources/Views/assets/css/styles.css') !!}
    {!! HTML::style('/resources/assets/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}
    {!! HTML::style('app/Modules/Framework/Resources/Views/assets/framework/frameworkstudio.css') !!}
@stop
@section('JS')
    {!! HTML::script('resources/assets/js/dropzone/js/dropzone.js') !!}
    {!! HTML::script('/resources/assets/js/bootstrap-select/js/bootstrap-select.min.js') !!}
    {!! HTML::script('/resources/assets/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') !!}
    {!! HTML::script('/resources/assets/js/ace-editor/ace.js') !!}
    {!! HTML::script('app/Modules/Framework/Resources/Views/assets/framework/framework.js') !!}
    {!! HTML::script('/app/Modules/Framework/Resources/Views/assets/framework/googlefont-api.js') !!}
    <script>
        $(document).ready(function () {
            $("body").on('change', '.select-type', function () {
                var value = $(this).val();
                window.location.href = window.location.pathname + "?type=" + value;
            });
            var p = "{!! $_GET['p'] or null !!}";
            var scrollTop = $(window).scrollTop();
            $(window).resize(function () {
                $('body').find('.popup_div').css({
                    'height': $(window).height() - 227,
                    "top": scrollTop
                });
            });
            $('.tpl-list').on("click", '.close_icon', function () {
                var id = $(this).attr('data-id');
                $(".popup_div_" + id).slideToggle("slow");
                $("body").css("overflow", "visible");
            });

        });
    </script>
@stop

