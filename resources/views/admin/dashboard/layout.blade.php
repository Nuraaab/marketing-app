<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maxton | Bootstrap 5 Admin Dashboard Template</title>
  <!--favicon-->
  <link rel="icon" href="admin/assets/images/favicon-32x32.png" type="image/png">
  <!-- loader-->
	<link href="admin/assets/css/pace.min.css" rel="stylesheet">
	<script src="admin/assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="admin/assets/plugins/metismenu/metisMenu.min.css">
  <link rel="stylesheet" type="text/css" href="admin/assets/plugins/metismenu/mm-vertical.css">
  <link rel="stylesheet" type="text/css" href="admin/assets/plugins/simplebar/css/simplebar.css">
  <link href="admin/assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet">
	<link href="admin/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet">
  <!--bootstrap css-->
  <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
  <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
  <!--main css-->
  <link href="admin/assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="admin/sass/main.css" rel="stylesheet">
  <link href="admin/sass/dark-theme.css" rel="stylesheet">
  <link href="admin/sass/blue-theme.css" rel="stylesheet">
  <link href="admin/sass/semi-dark.css" rel="stylesheet">
  <link href="admin/sass/bordered-theme.css" rel="stylesheet">
  <link href="admin/sass/responsive.css" rel="stylesheet">
  <style>
   .btn-close-custom {
    position: relative;
    width: 24px;
    height: 24px;
    background-color: white;
    border: none;
    cursor: pointer;
    display: inline-block;
    outline: none;
    padding: 0;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.btn-close-custom::before,
.btn-close-custom::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 16px;
    height: 2px;
    background-color: #333; /* Dark color for the "X" */
    transition: background-color 0.3s ease;
}

.btn-close-custom::before {
    transform: translate(-50%, -50%) rotate(45deg);
}

.btn-close-custom::after {
    transform: translate(-50%, -50%) rotate(-45deg);
}

.btn-close-custom:hover {
    background-color: white; /* Light background on hover */
}

.btn-close-custom:hover::before,
.btn-close-custom:hover::after {
    background-color: #f00; /* Change "X" color on hover to red */
}

.btn-close-custom:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 0, 0, 0.3); /* Red focus outline */
    background-color:white;
}

</style>

</head>

<body>


@yield('content')

<script src="admin/assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="admin/assets/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="admin/assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="admin/assets/plugins/apexchart/apexcharts.min.js"></script>
  <script src="admin/assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="admin/assets/plugins/peity/jquery.peity.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="admin/assets/plugins/select2/js/select2-custom.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
		
		$(".datepicker").flatpickr();

		$(".time-picker").flatpickr({
				enableTime: true,
				noCalendar: true,
				dateFormat: "Y-m-d H:i",
			});

		$(".date-time").flatpickr({
				enableTime: true,
				dateFormat: "Y-m-d H:i",
		});

		$(".date-format").flatpickr({
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});

		$(".date-range").flatpickr({
			mode: "range",
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});

		$(".date-inline").flatpickr({
			inline: true,
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});

	</script>
  <script>
    $(".data-attributes span").peity("donut")
  </script>
  <script src="admin/assets/js/main.js"></script>
  <script src="admin/assets/js/dashboard1.js"></script>
  <script>
	   new PerfectScrollbar(".user-list")
  </script>
	
  
<script>
	  function previewImage(event) {
        const input = event.target;
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            // When the file is loaded, set it as the preview image
            reader.onload = function(e) {
                // Hide "No Image Found" text
                document.getElementById('noImage').style.display = 'none';
                
                // Show the image preview
                const imgPreview = document.getElementById('imagePreview');
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block'; // Make sure the image is visible
            };

            // Read the selected image file
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    function previewIcon(event) {
        const fileInput = event.target;
        const previewContainer = document.getElementById('iconPreviewContainer');
        const previewImage = document.getElementById('iconPreview');
        
        if (fileInput.files && fileInput.files[0]) {
            const file = fileInput.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const fileType = file.type;
                
                // Remove previous SVG elements if any
                const existingSvg = previewContainer.querySelector('svg');
                if (existingSvg) {
                    existingSvg.remove();
                }

                if (fileType === 'image/svg+xml') {
                    // If the file is an SVG, render it inline as an <img> tag
                    previewImage.style.display = 'none'; // Hide the default preview image
                    const svgElement = document.createElement('img');
                    svgElement.src = e.target.result;
                    svgElement.width = 200;
                    svgElement.classList.add('rounded-3');
                    previewContainer.appendChild(svgElement);
                } else {
                    // If it's an image (jpg/png), display it normally
                    previewImage.style.display = 'block';
                    previewImage.src = e.target.result;
                }
            }
            
            reader.readAsDataURL(file); // Convert the file to a Data URL for preview
        }
    }
    function previewAbout(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('aboutPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function previewQuote(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('quotePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}


// service

function previewServiceImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('servicePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function previewServiceIcon(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('serviceIconPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

//team

function previewTeamImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('teamPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

//logo
function previewLogo(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
function previewWhy(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('whyPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function previewWhyIcon(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('whyIconPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}


// function previewPortfolioImage(event) {
//     var reader = new FileReader();
//     reader.onload = function(){
//         var output = document.getElementById('portfolioPreview');
//         output.src = reader.result;
//     };
//     reader.readAsDataURL(event.target.files[0]);
// }


function previewPortfolioIcon(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('portfolioIconPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function previewFaq(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('faqPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function previewCounterImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('testimonialPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function previewUserImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('userPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function previewTestimonial(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('counterPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}


function previewBlogImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('blogPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function previewBrandImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('brandPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
function previewPackageImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('packagePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}


function previewContactImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('contactPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

//banner
function previewBanner(event) {
    const bannerPreviewContainer = document.getElementById('bannerPreviewContainer');
    bannerPreviewContainer.innerHTML = ''; // Clear existing previews

    const files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = document.createElement('img');
            img.id = `bannerPreview_${i}`;
            img.src = e.target.result;
            img.width = 150;
            img.height = 150;
            img.className = 'rounded-3 m-2';
            img.alt = 'Banner Image';

            bannerPreviewContainer.appendChild(img);
        };

        reader.readAsDataURL(file);
    }
}



</script>


</body>

</html>