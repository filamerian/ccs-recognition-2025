<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FCU CCS Recognition Program 2025 Gallery</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #121212;
      color: #f0f0f0;
      text-align: center;
      margin: 0;
      padding: 20px;
    }

    h1 {
      margin-bottom: 30px;
      font-weight: normal;
      color: #ffffff;
    }

    .gallery {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
    }

    .thumbnail {
      width: 220px;
      height: 160px;
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .thumbnail img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      filter: grayscale(30%);
      transition: filter 0.3s ease;
    }

    .thumbnail:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
    }

    .thumbnail:hover img {
      filter: grayscale(0%);
    }

    .lightbox {
      display: none;
      position: fixed;
      z-index: 1000;
      inset: 0;
      background: rgba(0, 0, 0, 0.85);
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .lightbox img {
      max-width: 90%;
      max-height: 90%;
      object-fit: contain;
      border-radius: 8px;
    }

    .arrow {
      position: absolute;
      top: 50%;
      font-size: 50px;
      color: #fff;
      background: rgba(0,0,0,0.3);
      border: none;
      cursor: pointer;
      user-select: none;
      transform: translateY(-50%);
    }

    .arrow.left { left: 20px; }
    .arrow.right { right: 20px; }
  </style>
</head>
<body>


  <table width="900" border="0" align="center">
    <tr>
      <td width="61" height="77"><div align="center"><strong><img src="../images/ccs-logo-white.png" width="49" height="49"></strong></div></td>
      <td width="829"><h1 align="left"><strong> FCU CCS Recognition Program 2025 Gallery</strong></h1></td>
    </tr>
  </table>
  <div class="gallery">
    <?php
      $dir = "images/";
      $images = glob($dir . "*.jpg");
      $imagePaths = json_encode($images);
      foreach ($images as $index => $image) {
        echo "<div class='thumbnail' onclick='openLightbox($index)'><img src='$image' alt='Photo'></div>";
      }
    ?>
  </div>

  <div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <button class="arrow left" onclick="event.stopPropagation(); prevImage()">&#10094;</button>
    <img id="lightbox-img" src="" alt="Enlarged view">
    <button class="arrow right" onclick="event.stopPropagation(); nextImage()">&#10095;</button>
  </div>

  <script>
    const images = <?php echo $imagePaths; ?>;
    let currentIndex = 0;

    function openLightbox(index) {
      currentIndex = index;
      document.getElementById('lightbox-img').src = images[currentIndex];
      document.getElementById('lightbox').style.display = 'flex';
    }

    function closeLightbox() {
      document.getElementById('lightbox').style.display = 'none';
    }

    function prevImage() {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      document.getElementById('lightbox-img').src = images[currentIndex];
    }

    function nextImage() {
      currentIndex = (currentIndex + 1) % images.length;
      document.getElementById('lightbox-img').src = images[currentIndex];
    }
  </script>

</body>
</html>