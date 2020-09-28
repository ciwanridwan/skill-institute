<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Tambah Voucher</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('store-create-voucher', $item->id)}}" method="post">
                        @csrf
                        @method('post')
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="number" id="defaultForm-email" class="form-control validate" name="voucher">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Tambah Voucher</label>
                        </div>
                        
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-default">Tambah</button>
                    </div>
                </form>
                </div>
            </div>
        </div>