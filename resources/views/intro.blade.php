<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!-- INTRO OVERLAY -->
    <div id="intro-overlay">
        <div class="particles"></div>
        <div class="logo-container">
            <div class="logo glitch" data-text="🖥️ TECH ZONE">🖥️ DIGITAL WORLD</div>
        </div>
        <div id="typewriter" class="typewriter"></div>
        <!-- Nút Continue ẩn, sẽ hiện sau khi gõ chữ xong -->
        <button id="continue-btn" class="continue-btn" onclick="goToHomePage()">Tiến tới Trang Chủ</button>
    </div>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <!-- PARTICLES JS -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<style>
  #intro-overlay {
    position: fixed;
    z-index: 99999;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: radial-gradient(circle, #000 0%, #111 80%);
    display: grid;
    place-items: center;
    font-family: 'Courier New', monospace;
    color: #00ffff;
    text-align: center;
  }

  .logo-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
  }

  /* Logo */
  .logo {
    font-size: 4rem;
    font-weight: bold;
    position: relative;
    color: #00ffff;
    opacity: 0;
    transform: scale(0.8);
    transition: all 1s ease;
    z-index: 10;
  }

  .logo:hover {
    cursor: pointer;
    color: #ff00cc;
    transform: rotate(360deg) scale(1.2);
  }

  /* Typewriter effect */
  .typewriter {
    margin-top: 30px;
    font-size: 1.5rem;
    white-space: nowrap;
    overflow: hidden;
    width: 0;
    border-right: 3px solid #00ffff;
    opacity: 1;
    display: inline-block;
    z-index: 9999;
    font-family: 'Courier New', monospace;
  }

  /* Nút tiếp tục */
  .continue-btn {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #00ffff;
    color: #000;
    border: none;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    opacity: 0;  /* Nút ẩn hoàn toàn */
    pointer-events: none;  /* Không thể tương tác với nút khi ẩn */
    visibility: hidden;  /* Ẩn nút hoàn toàn khi trang vừa load */
  }

  .continue-btn:hover {
    background-color: #ff00cc;
    color: #fff;
  }

  .particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* Đảm bảo các particles nằm phía dưới */
  }
</style>




<script>
  // Chạy animation logo 3D với GSAP
  gsap.to(".logo", {
    duration: 1.5,
    opacity: 1,
    scale: 1.2,
    rotateY: 360,
    ease: "power4.out"
  });

  // Typewriter effect: Text đánh chữ
  const textLines = [
    "Khởi động hệ thống...",
    "Đang kết nối với TECH ZONE...",
    "Hệ thống sẵn sàng!"
  ];

  let lineIndex = 0;
  let charIndex = 0;
  const el = document.getElementById("typewriter");

  // Hiệu ứng gõ chữ đơn giản
  function typeWriter() {
    if (lineIndex < textLines.length) {
      if (charIndex < textLines[lineIndex].length) {
        el.innerHTML += textLines[lineIndex].charAt(charIndex);
        charIndex++;

        // Tăng width của .typewriter từ từ theo số ký tự đã gõ
        el.style.width = `${charIndex + 1}ch`; // Mỗi ký tự sẽ làm width tăng lên 1 "character"

        setTimeout(typeWriter, Math.random() * 150 + 100); // Thời gian giữa mỗi ký tự
      } else {
        lineIndex++; // Chuyển sang dòng tiếp theo
        charIndex = 0;
        setTimeout(() => {
          el.innerHTML = ""; // Xóa nội dung cũ
          el.style.width = "0"; // Reset width về 0
          typeWriter(); // Tiếp tục đánh chữ dòng mới
        }, 1500); // Khoảng nghỉ giữa các dòng
      }
    } else {
      // Khi gõ xong tất cả, hiển thị nút
      const continueBtn = document.getElementById("continue-btn");
      continueBtn.style.opacity = 1;
      continueBtn.style.visibility = 'visible';  // Hiển thị nút sau khi gõ xong
      continueBtn.style.pointerEvents = 'auto'; // Cho phép nhấn nút khi nút đã hiển thị
      continueBtn.style.transition = 'opacity 1s ease-in, visibility 1s ease-in'
    }
  }

  // Kích hoạt typewriter effect sau khi logo xuất hiện
  setTimeout(typeWriter, 1500);

  // Chuyển hướng khi người dùng nhấn nút
  function goToHomePage() {
    window.location.href = "http://127.0.0.1:8000/home";  // Thay đổi URL nếu cần
  }

  // Particles JS background - Thêm hiệu ứng tương tác
  particlesJS("intro-overlay", {
    "particles": {
      "number": { "value": 150 },
      "color": { "value": "#ff00cc" },
      "shape": { "type": "circle" },
      "opacity": { "value": 1 },
      "size": { "value": 2 },
      "line_linked": {
        "enable": true,
        "distance": 100,
        "color": "#00ffff",
        "opacity": 1,
        "width": 2
      },
      "move": {
        "enable": true,
        "speed": 3
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": { "enable": true, "mode": "repulse" }
      }
    },
    "retina_detect": true
  });
</script>





</body>

</html>
