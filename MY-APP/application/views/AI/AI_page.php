<div class='header'>
    HỆ THỐNG DỰ ĐOÁN BỆNH TRÊN CÂY SẦU RIÊNG TRÊN LÁ
</div>
<div class='content'>

    <div class='upload_part'>
        <button class='upload_button' id="upload_button">Chọn file ảnh lá..</button>
        <div class='upload_hint' id='upload_hint'>
            Các định dạng được hỗ trợ: PNG, JPG và JPEG
        </div>
        <form action="/" method="POST" enctype="multipart/form-data" id='form'>
            <input type="file" name="file" id="fileinput" accept="image/*" style="display:none">
        </form>
    </div>

    <div class='result_part'>
        <div class='result_title'><b>Kết quả nhận diện</b></div>
        <div class='result_id' id="result_info">_</div>
        <img style="max-width:300px; border-radius:1rem"
             src="https://reactnativecode.com/wp-content/uploads/2018/02/Default_Image_Thumbnail.png"
             alt="User Image" id="display_image">
    </div>
</div>