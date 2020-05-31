@if(count($errors) > 0)
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @foreach($errors->all() as $error)
                        <div class="modal-message">
                            <div class="modal-fa"><i class="fas fa-times-circle" style="color: red"></i></div>
                            <div>{{$error}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-message">
                        <div class="modal-fa"><i class="fas fa-check-circle" style="color: green"></i></div>
                        <div>{{session('success')}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-message">
                        <div class="modal-fa"><i class="fas fa-times-circle" style="color: red"></i></div>
                        <div>{{session('error')}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
