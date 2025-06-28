const sliderItem = document.querySelectorAll('.slider-item')
for (let index = 0; index < sliderItem.length; index++) {

    sliderItem[index].style.left = index * 100 + "%"

}

const sliderItems = document.querySelector('.slider-items')
const arrowRight = document.querySelector('.bi.bi-arrow-right')
const arrowLeft = document.querySelector('.bi.bi-arrow-left')
let i = 0
if (arrowRight != null && arrowLeft != null) {
    arrowRight.addEventListener('click', () => {
        if (i < sliderItem.length - 1) {
            i++
            sliderMove(i)
        } else {
            return false;
        }

    })
    arrowLeft.addEventListener('click', () => {
        if (i > 0) {
            i--
            sliderMove(i)
        } else {
            return false;
        }
    })
    function autoSlider() {
        if (i < sliderItem.length - 1) {
            i++
            sliderMove(i)
        } else {
            i = 0
            sliderMove(i)
        }
    }
    function sliderMove(i) {
        sliderItems.style.left = -i * 100 + "%"
    }
    setInterval(autoSlider, 15000)

}
// Menubar responsive
const Menubar = document.querySelector('.header-bar-icon')
const headerNav = document.querySelector('.header-nav')
Menubar.addEventListener('click', () => {
    headerNav.classList.toggle('active')
})

//stiky header
window.addEventListener('scroll', () => {
    if (scrollY > 50) {
        document.querySelector('#header').classList.add('active')
    }
    else {
        document.querySelector('#header').classList.remove('active')
    }
})
//click product image detail
const imageTiny = document.querySelectorAll('.product-images-items img')
const imageMain = document.querySelector('.main-image')
for (let index = 0; index < imageTiny.length; index++) {
    imageTiny[index].addEventListener('click', () => {
        imageMain.src = imageTiny[index].src
        imageTiny.forEach(element => {
            element.classList.remove('active')
        });
        imageTiny[index].classList.add('active')
    })

}
//quantity-product
const quantityPLus = document.querySelectorAll('.plus-icon')
const quantityMinus = document.querySelectorAll('.minus-icon')
const quantityInput = document.querySelectorAll('.quantity-input')

if (quantityMinus != null && quantityPLus != null) {
    for (let index = 0; index < quantityPLus.length; index++) {
        quantityPLus[index].addEventListener('click', () => {
            quantityInput[index].value++
        })
        quantityMinus[index].addEventListener('click', () => {
            if (quantityInput[index].value > 0) {
                quantityInput[index].value--
            } else {
                return false
            }
        })

    }
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
window.onbeforeunload = function () {
    document.querySelector('.loading-effect').style.display = 'flex';
    document.querySelector('.dark-effect').classList.add('show');
    setTimeout(function () {
        document.querySelector('.loading-effect').style.display = 'none';
        document.querySelector('.dark-effect').classList.remove('show');
    }, 10000);
};
