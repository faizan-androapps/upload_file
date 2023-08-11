const form = document.querySelector("form"),
fileInput = document.querySelector(".file-input"),
uploadedArea = $("#uploadedArea"); // Replace with your actual element's ID
progressArea = $("#progressArea"); // Replace with your actual element's ID

console.log(fileInput);

// console.log(fileInput);
// console.log(progressArea);
// console.log(uploadedArea);

form.addEventListener("click", () => {
  fileInput.click();
});
// document.querySelector(".fa-cloud-upload-alt").addEventListener("click", () => {
//     fileInput.click();
// });


let dropArea = document.getElementById("drop-area");

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false);

})

dropArea.addEventListener('drop', handleDrop, false)



fileInput.onchange = ({ target }) => {
  let file = target.files[0];
  console.log(target.files);
  const data = getDetails();
  if (file) {
    let fileName = file.name;
    // if (fileName.length >= 12) {
    //   let splitName = fileName.split('.');
    //   fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
    // }
    uploadFile(fileName, file);
  }
}

function handleDrop(e) {
  let dt = e.dataTransfer;
  console.log(dt.files);
  // let file1 = dt.files;

  let file = dt.files[0];
  console.log(file);
  if (file) {
    let fileName = file.name;
    uploadFile(fileName, file);
  }

  // console.log(file1[0].name);
  // console.log(files);
  // console.log(files[0].name);

}
function preventDefaults(e) {
  e.preventDefault()
  e.stopPropagation()
}

function getDetails(){
  let title=document.getElementById('asdasd').val();
  let noOfDays=document.getElementById("mn").val();
  return {
    title: title,
    noOfDays: noOfDays
  }
}

function uploadFile(name,file) {
  const formData = new FormData();
  formData.append("file", file);
  formData.append("file", file);

  $.ajax({
    type: "POST",
    url: "php/upload.php",
    data: formData,
    xhr: function () {
      let xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener("progress", function (event) {
        if (event.lengthComputable) {
          console.log(event);
          let loaded = event.loaded;
          let total = event.total;
          let fileLoaded = (loaded / total) * 100;
          let fileTotal = total / 1000;
          let fileSize = (fileTotal < 1024) ? fileTotal + " KB" : (loaded / (1024 * 1024)).toFixed(2) + " MB";

          console.log(loaded, 'loaded');
          console.log(total, 'total');
          console.log(fileLoaded, 'fileloaded');
          console.log(fileTotal, 'fileTotal');
          console.log(fileSize, 'fileSize');


          let progressHTML = `<li class="row">
                                <i class="fas fa-file-alt"></i>
                                <div class="content">
                                  <div class="details">
                                    <span class="name">${name} • Uploading</span>
                                    <span class="percent">${fileLoaded}%</span>
                                  </div>
                                  <div class="progress-bar">
                                    <div class="progress" style="width: ${fileLoaded}%"></div>
                                  </div>
                                </div>
                              </li>`;

          uploadedArea.addClass("onprogress");
          progressArea.html(progressHTML);

          if (loaded == total) {
            progressArea.html("");
            let uploadedHTML = `<li class="row">
                                  <div class="content upload">
                                    <i class="fas fa-file-alt"></i>
                                    <div class="details">
                                      <span class="name">${name} • Uploaded</span>
                                      <span class="size">${fileSize}</span>
                                    </div>
                                  </div>
                                  <i class="fas fa-check"></i>
                                </li>`;

            uploadedArea.removeClass("onprogress");
            uploadedArea.prepend(uploadedHTML);
          }
        }
      });

      return xhr;
    },
    processData: false,
    contentType: false,
    success: function (data) {
      // Handle success response
    },
    error: function (error) {
      // Handle error
    }
  });
}