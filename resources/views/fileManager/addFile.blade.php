@extends('layout')

@section('content')
    <div class="row">
        <div class="col sm12 m11 l11">
            <h4>File manager</h4>
            <div class="card">
                <div class="card-content">
                    <div class="filemanager">

                        <div class="search">
                            <input type="search" placeholder="Find a file.." />
                        </div>

                        <div class="breadcrumbs"></div>

                        <ul class="data"></ul>

                        <div class="nothingfound">
                            <div class="nofiles"></div>
                            <span>No files here.</span>
                        </div>

                    </div>
                </div>
            </div>
            <a class='dropdown-button btn-large blue waves-effect waves-light right' href='#' data-activates='dropdown1'>New</a>

            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="#!">New Folder</a></li>
                <li><a href="#modal1">Upload File</a></li>
            </ul>
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <form action="{{ url('/upload')}}" class="dropzone" id="my-awesome-dropzone">
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Include o