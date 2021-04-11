<div class="border">
    <div class="alert alert-primary rounded-0 py-2 mb-0" role="alert">
        Thêm công việc
    </div>
    <div class="p-4">
        <form id="form-create">
            <div class="form-group">
                <label for="">Tên:</label>
                <input name="name" type="text" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
                <label for="">Trạng thái:</label>
                <select name="status" class="form-control form-control-sm" required>
                    <option value="0" selected>Kích Hoạt</option>
                    <option value="1">Hoàn Tất</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Lưu lại
                </button>
                <button id="button-cancel" type="button" class="btn btn-danger btn-sm">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    Hủy bỏ
                </button>
            </div>
        </form>
    </div>
</div>