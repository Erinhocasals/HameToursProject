<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Comentarios</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-content">
                        <div class="nestable">
                            <div class="dd" id="nestable">
                                <ol class="dd-list">
                                    @include('admin.comments.index', ['comments' => $comments])
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
