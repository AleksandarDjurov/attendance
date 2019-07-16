@extends('layouts.personal')
    @section('meta')
    <title>@lang('pe_setting.title')</title>
    <meta name="description" content="smart Control Horario my settings.">
    @endsection

    @section('styles')
        <script>var admin = false;</script>
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">@lang('pe_setting.page_title')</h2>
            </div>    
        </div>

        <div class="row">
            <div class="col-md-12">

            <div class="box box-success">
                <div class="box-body">
                            
                    <div class="ui secondary blue pointing tabular menu">
                        <a class="item active" data-tab="about">@lang('pe_setting.about')</a>
                        <a class="item" data-tab="attribution">@lang('pe_setting.attribution')</a>
                    </div>
                    
                    <div class="ui tab active" data-tab="about">
                        <div class="col-md-12">
                            <div class="tab-content">
                                <p class="license col-md-6" style="margin-bottom:0">
                                    <h3 style="margin-top:0" class="ui header">@lang('pe_setting.head1')</h3>
                                    <p>@lang('pe_setting.msg1')</p>

                                    <h4 class="ui header">@lang('pe_setting.feature')</h4>
                                    <ul>
                                        <li>@lang('pe_setting.feature1')</li>
                                        <li>@lang('pe_setting.feature2')</li>
                                        <li>@lang('pe_setting.feature3')</li>
                                        <li>@lang('pe_setting.feature4')</li>
                                        <li>@lang('pe_setting.feature5')</li>
                                        <li>@lang('pe_setting.feature6')</li>
                                        <li>@lang('pe_setting.feature7')</li>
                                        <li>@lang('pe_setting.feature8')</li>
                                    </ul>
                                    <div class="footer-text">
                                        <div class="sub header">@lang('pe_setting.subhead1')</div>
                                        <div class="sub header">@lang('pe_setting.submsg1')</div>
                                    </div>
                                </p>

                                <div class="ui section divider"></div>
                                <h4 class="ui header">@lang('pe_setting.subhead2')
                                    <div class="sub header">@lang('pe_setting.submsg2')</div>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="ui tab" data-tab="attribution">
                        <div class="tab-content">
                        <h3 class="ui header">@lang('pe_setting.head2')
                        <div class="sub header">@lang('pe_setting.msg2')</div>
                        </h3>

                        <h5 class="ui header">@lang('pe_setting.head3')
                        <div class="sub header">@lang('pe_setting.subhead3')</div>
                        </h5>
                        <p class="license col-md-6">
                            @lang('pe_setting.submsg3')
                        </p>

                        <h5 class="ui header">@lang('pe_setting.head4')
                        <div class="sub header">@lang('pe_setting.subhead4')</div>
                        </h5>
                        <p class="license col-md-6">
                            @lang('pe_setting.submsg4')
                        </p>

                        <h5 class="ui header">@lang('pe_setting.head5')
                        <div class="sub header">@lang('pe_setting.subhead5')</div>
                        </h5>
                        <p class="license col-md-6">
                            @lang('pe_setting.submsg5')
                        </p>

                        <h5 class="ui header">@lang('pe_setting.head6')
                        <div class="sub header">@lang('pe_setting.subhead6')</div>
                        </h5>
                        <p class="license col-md-6">
                            @lang('pe_setting.submsg6')
                        </p>

                        <h5 class="ui header">@lang('pe_setting.head7')
                        <div class="sub header">@lang('pe_setting.subhead7')</div>
                        </h5>
                        <p class="license col-md-6">
                            @lang('pe_setting.submsg7')
                        </p>

                        <h5 class="ui header">@lang('pe_setting.head8')
                        <div class="sub header">@lang('pe_setting.subhead8')</div>
                        </h5>
                        <p class="license col-md-6">
                            @lang('pe_setting.submsg8')
                        </p>

                        <h5 class="ui header">@lang('pe_setting.head9')
                        <div class="sub header">@lang('pe_setting.subhead9')</div>
                        </h5>
                        <p class="license col-md-6">
                            @lang('pe_setting.submsg9')
                        </p>

                        <h5 class="ui header">@lang('pe_setting.head10')
                        <div class="sub header">@lang('pe_setting.subhead10')</div>
                        </h5>
                        <p class="license col-md-6">
                            @lang('pe_setting.submsg10')
                        </p>
                        </div>
                    </div>

                </div>
            </div>

            </div>
        </div>
    </div>

    @endsection
    
    @section('scripts')
    <script type="text/javascript">
        $('.menu .item').tab();
    </script>
    @endsection 