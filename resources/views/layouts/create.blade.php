@extends ('layouts.master')

@section ('content')
    <div class="row">
        <h1>New Studio</h1>
        <div class="divider"></div>
    </div>
    <div class="row">
        <form method="POST" action="{{ url('admin/studios') }}" class="col s12">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s6">
                    <input name="name" id="name" type="text" class="validate">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="info" id="info" class="materialize-textarea"></textarea>
                    <label for="info">Info</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="specs" id="specs" class="materialize-textarea"></textarea>
                    <label for="specs">Specs (seperated by ,)</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>File</span>
                        <input name="coverPhoto" id="coverPhoto" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Cover photo">
                    </div>
                </div>
                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>Files</span>
                        <input name="photos" id="photos" type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Other photos">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="location" id="location" type="text" class="validate">
                    <label for="location">Location</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <span class="grey-text">Assistance available for this studio?</span><br/><br/>
                    <div class="switch">
                        <label>
                            No
                            <input name="assistance" type="checkbox" value="1">
                            <span class="lever"></span>
                            Yes
                        </label>
                        <br/><br/>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit">
                    Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>

@endsection

@section ('footer')
    <script src=""></script>
@endsection