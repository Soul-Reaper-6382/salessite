@extends('layouts.app2')

@section('content')
<style type="text/css">
    .calc_tabs{
        margin-bottom: 20px;
    }
    .calc_tabs p {
    background: #f1ecec59;
    border-radius: 10px;
    padding: 10px;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    color: #c7bebe;
}
.calc_tabs p:hover{
background: hsl(45.18deg 100% 50%);
color: black;
}
.calc_tabs p.active{
background: hsl(45.18deg 100% 50%);
color: black;
}
</style>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-calculator"></i>
            </span> Calculator Setting
        </h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('update_calculator_settings') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="heading_one" class="form-label">Main Heading</label>
                            <input name="heading_one" type="text" required class="form-control" id="heading_one" placeholder="Heading" value="{{ $calcSettings->heading_one ?? '' }}">
                        </div>

                        <div class="row calc_tabs">
                            <div class="col-lg-4">
                                <p class="active" data-id="1">{{ $calcSettings->heading_tab ?? '' }}</p>
                            </div>
                            <div class="col-lg-4">
                                <p data-id="2">{{ $calcSettings->heading_tab_two ?? '' }}</p>
                            </div>
                            <div class="col-lg-4">
                                <p data-id="3">{{ $calcSettings->heading_tab_three ?? '' }}</p>
                            </div>
                        </div>

                        <div class="calc_tab_visi" data-id="1">
                        <div class="form-group">
                            <label for="text_one" class="form-label">Tab Heading</label>
                            <input name="heading_tab" type="text" required class="form-control" id="heading_tab" placeholder="Text" value="{{ $calcSettings->heading_tab ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_one" class="form-label">Text</label>
                            <input name="text_one" type="text" required class="form-control" id="text_one" placeholder="Text" value="{{ $calcSettings->text_one ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_two" class="form-label">Text</label>
                            <input name="text_two" type="text" required class="form-control" id="text_two" placeholder="Text" value="{{ $calcSettings->text_two ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="heading_two" class="form-label">Heading</label>
                            <input name="heading_two" type="text" required class="form-control" id="heading_two" placeholder="Heading" value="{{ $calcSettings->heading_two ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_three" class="form-label">Text</label>
                            <input name="text_three" type="text" required class="form-control" id="text_three" placeholder="Text" value="{{ $calcSettings->text_three ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_four" class="form-label">Text</label>
                            <input name="text_four" type="text" required class="form-control" id="text_four" placeholder="Text" value="{{ $calcSettings->text_four ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_five" class="form-label">Text</label>
                            <input name="text_five" type="text" required class="form-control" id="text_five" placeholder="Text" value="{{ $calcSettings->text_five ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_six" class="form-label">Text</label>
                            <input name="text_six" type="text" required class="form-control" id="text_six" placeholder="Text" value="{{ $calcSettings->text_six ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_seven" class="form-label">Text</label>
                            <input name="text_seven" type="text" required class="form-control" id="text_seven" placeholder="Text" value="{{ $calcSettings->text_seven ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_eight" class="form-label">Text</label>
                            <input name="text_eight" type="text" required class="form-control" id="text_eight" placeholder="Text" value="{{ $calcSettings->text_eight ?? '' }}">
                        </div>

                        <div class="form-group" style="display: none;">
                            <label for="text_nine" class="form-label">Text</label>
                            <input name="text_nine" type="text"  class="form-control" id="text_nine" placeholder="Text" value="{{ $calcSettings->text_nine ?? '' }}">
                        </div>
                      </div>



                      <div class="calc_tab_visi" data-id="2" style="display: none;">
                    <div class="form-group">
                        <label for="heading_tab_two" class="form-label">Tab Heading</label>
                        <input name="heading_tab_two" type="text" required class="form-control" id="heading_tab_two" placeholder="Text" value="{{ $calcSettings->heading_tab_two ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_ten" class="form-label">Text</label>
                        <input name="text_ten" type="text" required class="form-control" id="text_ten" placeholder="Text" value="{{ $calcSettings->text_ten ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_eighteen" class="form-label">Text</label>
                        <input name="text_eighteen" type="text" required class="form-control" id="text_eighteen" placeholder="Text" value="{{ $calcSettings->text_eighteen ?? '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="text_eleven" class="form-label">Text</label>
                        <input name="text_eleven" type="text" required class="form-control" id="text_eleven" placeholder="Text" value="{{ $calcSettings->text_eleven ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="heading_three" class="form-label">Heading</label>
                        <input name="heading_three" type="text" required class="form-control" id="heading_three" placeholder="Heading" value="{{ $calcSettings->heading_three ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_twelve" class="form-label">Text</label>
                        <input name="text_twelve" type="text" required class="form-control" id="text_twelve" placeholder="Text" value="{{ $calcSettings->text_twelve ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_thirteen" class="form-label">Text</label>
                        <input name="text_thirteen" type="text" required class="form-control" id="text_thirteen" placeholder="Text" value="{{ $calcSettings->text_thirteen ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_fourteen" class="form-label">Text</label>
                        <input name="text_fourteen" type="text" required class="form-control" id="text_fourteen" placeholder="Text" value="{{ $calcSettings->text_fourteen ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_fifteen" class="form-label">Text</label>
                        <input name="text_fifteen" type="text" required class="form-control" id="text_fifteen" placeholder="Text" value="{{ $calcSettings->text_fifteen ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_sixteen" class="form-label">Text</label>
                        <input name="text_sixteen" type="text" required class="form-control" id="text_sixteen" placeholder="Text" value="{{ $calcSettings->text_sixteen ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_seventeen" class="form-label">Text</label>
                        <input name="text_seventeen" type="text" required class="form-control" id="text_seventeen" placeholder="Text" value="{{ $calcSettings->text_seventeen ?? '' }}">
                    </div>

                    
                </div>






                      <div class="calc_tab_visi" data-id="3" style="display: none;">
                        <div class="form-group">
                            <label for="text_one" class="form-label">Tab Heading</label>
                            <input name="heading_tab_three" type="text" required class="form-control" id="heading_tab_three" placeholder="Text" value="{{ $calcSettings->heading_tab_three ?? '' }}">
                        </div>

                        <div class="form-group">
                        <label for="text_nineteen" class="form-label">Text</label>
                        <input name="text_nineteen" type="text" required class="form-control" id="text_nineteen" placeholder="Text" value="{{ $calcSettings->text_nineteen ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_twenty" class="form-label">Text</label>
                        <input name="text_twenty" type="text" class="form-control" id="text_twenty" placeholder="Text" value="{{ $calcSettings->text_twenty ?? '' }}">
                    </div>


                        <div class="form-group">
                            <label for="heading_four" class="form-label">Heading</label>
                            <input name="heading_four" type="text" required class="form-control" id="heading_four" placeholder="Heading" value="{{ $calcSettings->heading_four ?? '' }}">
                        </div>

                         <div class="form-group">
                        <label for="text_twenty_one" class="form-label">Text</label>
                        <input name="text_twenty_one" type="text" required class="form-control" id="text_twenty_one" placeholder="Text" value="{{ $calcSettings->text_twenty_one ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_twenty_two" class="form-label">Text</label>
                        <input name="text_twenty_two" type="text" required class="form-control" id="text_twenty_two" placeholder="Text" value="{{ $calcSettings->text_twenty_two ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_twenty_three" class="form-label">Text</label>
                        <input name="text_twenty_three" type="text" required class="form-control" id="text_twenty_three" placeholder="Text" value="{{ $calcSettings->text_twenty_three ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_twenty_four" class="form-label">Text</label>
                        <input name="text_twenty_four" type="text" required class="form-control" id="text_twenty_four" placeholder="Text" value="{{ $calcSettings->text_twenty_four ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_twenty_five" class="form-label">Text</label>
                        <input name="text_twenty_five" type="text" required class="form-control" id="text_twenty_five" placeholder="Text" value="{{ $calcSettings->text_twenty_five ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="text_twenty_six" class="form-label">Text</label>
                        <input name="text_twenty_six" type="text" required class="form-control" id="text_twenty_six" placeholder="Text" value="{{ $calcSettings->text_twenty_six ?? '' }}">
                    </div>

                    <div class="form-group" style="display: none;">
                        <label for="text_twenty_seven" class="form-label">Text</label>
                        <input name="text_twenty_seven" type="text" class="form-control" id="text_twenty_seven" placeholder="Text" value="{{ $calcSettings->text_twenty_seven ?? '' }}">
                    </div>
                      </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

</div>
<script type="text/javascript">
    $(document).on('click','.calc_tabs p',function(){
        var id = $(this).attr('data-id');
        $('.calc_tabs p').removeClass('active')
        $(this).addClass('active')
        $('.calc_tab_visi').hide();
        $('.calc_tab_visi[data-id="'+id+'"]').show();
        })
</script>
@endsection
