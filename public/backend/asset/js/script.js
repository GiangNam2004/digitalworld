const menuLi = document.querySelectorAll('.admin-sidebar-content > ul > li > a')
const submenu = document.querySelectorAll('.sub-menu')

for (let index = 0; index < menuLi.length; index++) {
    menuLi[index].addEventListener('click', (e) => {
        e.preventDefault()
         const submenuHeight = menuLi[index].parentNode.querySelector('ul .sub-menu-item').offsetHeight
        for (let i = 0; i < submenu.length; i++) {
            submenu[i].setAttribute('style', 'height:0px')
        }
        menuLi[index].parentNode.querySelector('ul').setAttribute('style', 'height:' + submenuHeight + 'px')
    })
}

//effect
$(document).ready(function () {
    // Hàm kiểm tra khi người dùng cuộn trang
    $(window).on('scroll', function () {
        // Kiểm tra tất cả các phần tử có class 'scroll-effect'
        $('.slide-left-effect, .slide-right-effect, .slide-top-effect, .slide-bottom-effect, .fade-in-effect').each(function () {
            var elementTop = $(this).offset().top;  // Vị trí của phần tử trên trang
            var windowBottom = $(window).scrollTop() + $(window).height();  // Vị trí của cửa sổ trình duyệt

            // Kiểm tra xem phần tử đã vào màn hình chưa
            if (windowBottom > elementTop) {
                $(this).addClass('in-view');  // Thêm class để kích hoạt hiệu ứng
            }
        });
    });

    // Khởi tạo hiệu ứng khi trang tải lần đầu
    $(window).trigger('scroll');
});

const form = document.querySelector('form'); // Giả sử bạn có form chứa các input file
const avatarFileInput = document.getElementById('file');
const productFilesInput = document.getElementById('files');

form.addEventListener('submit', function(event) {
    // Kiểm tra nếu người dùng không chọn ảnh đại diện
    if (avatarFileInput.files.length === 0) {
        alert('Vui lòng chọn ảnh đại diện');
        event.preventDefault();  // Ngừng gửi form
    }

    // Kiểm tra nếu người dùng không chọn ảnh sản phẩm
    if (productFilesInput.files.length === 0) {
        alert('Vui lòng chọn ảnh sản phẩm');
        event.preventDefault();  // Ngừng gửi form
    }
});
