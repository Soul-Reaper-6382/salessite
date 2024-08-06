@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-clipboard-text"></i>
            </span> Text Setting
        </h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('update_text_settings') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="heading_one" class="form-label">Heading</label>
                            <input name="heading_one" type="text" required class="form-control" id="heading_one" placeholder="Heading" value="{{ $textSettings->heading_one ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="heading_two" class="form-label">Heading</label>
                            <input name="heading_two" type="text" required class="form-control" id="heading_two" placeholder="Heading" value="{{ $textSettings->heading_two ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text" class="form-label">Text</label>
                            <input name="text" type="text" required class="form-control" id="text" placeholder="Text" value="{{ $textSettings->text ?? '' }}">
                        </div>
                      
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('update_home_text2') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="heading_one" class="form-label">Heading</label>
                            <input name="heading_one" type="text" required class="form-control" id="heading_one" placeholder="Heading" value="{{ $home_text2->heading_one ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text" class="form-label">Text</label>
                            <input name="text" type="text" required class="form-control" id="text" placeholder="Text" value="{{ $home_text2->text ?? '' }}">
                        </div>
                      
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('update_circle_text_settings') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="heading_one" class="form-label">Heading</label>
                            <input name="heading_one" type="text" required class="form-control" id="heading_one" placeholder="Heading" value="{{ $circleTextSettings->heading_one ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text" class="form-label">Text</label>
                            <input name="text" type="text" required class="form-control" id="text" placeholder="Text" value="{{ $circleTextSettings->text ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="cir1" class="form-label">Circle 1</label>
                            <input name="cir1" type="text" required class="form-control" id="cir1" placeholder="Circle 1" value="{{ $circleTextSettings->cir1 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="cir2" class="form-label">Circle 2</label>
                            <input name="cir2" type="text" required class="form-control" id="cir2" placeholder="Circle 2" value="{{ $circleTextSettings->cir2 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="cir3" class="form-label">Circle 3</label>
                            <input name="cir3" type="text" required class="form-control" id="cir3" placeholder="Circle 3" value="{{ $circleTextSettings->cir3 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="cir4" class="form-label">Circle 4</label>
                            <input name="cir4" type="text" required class="form-control" id="cir4" placeholder="Circle 4" value="{{ $circleTextSettings->cir4 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="cir5" class="form-label">Circle 5</label>
                            <input name="cir5" type="text" required class="form-control" id="cir5" placeholder="Circle 5" value="{{ $circleTextSettings->cir5 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="cir6" class="form-label">Circle 6</label>
                            <input name="cir6" type="text" required class="form-control" id="cir6" placeholder="Circle 6" value="{{ $circleTextSettings->cir6 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="cir7" class="form-label">Circle 7</label>
                            <input name="cir7" type="text" required class="form-control" id="cir7" placeholder="Circle 7" value="{{ $circleTextSettings->cir7 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="cir8" class="form-label">Circle 8</label>
                            <input name="cir8" type="text" required class="form-control" id="cir8" placeholder="Circle 8" value="{{ $circleTextSettings->cir8 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="cir9" class="form-label">Circle 9</label>
                            <input name="cir9" type="text" required class="form-control" id="cir9" placeholder="Circle 9" value="{{ $circleTextSettings->cir9 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="cir10" class="form-label">Circle 10</label>
                            <input name="cir10" type="text" required class="form-control" id="cir10" placeholder="Circle 10" value="{{ $circleTextSettings->cir10 ?? '' }}">
                        </div>
                      
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
