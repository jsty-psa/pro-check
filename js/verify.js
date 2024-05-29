var base64_images = new Object();
var image_file_names = new Object();
var visitor_name = "";
var points = 0;
var wrong_points = 0;
var data = "";

const snd = new Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");

document.addEventListener("DOMContentLoaded", event => {
    const cameralist = document.getElementById('cameralist');
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    Instascan.Camera.getCameras().then(cameras => {
        if(cameras.length) {
            for(var i = 0; i < cameras.length; i++) {
                let option = document.createElement('option');
                option.value = cameras[i].id;
                option.text = cameras[i].name;
                document.getElementById('cameralist').add(option);
            }
            scanner.camera = cameras[0];
            // scanner.camera = cameras[cameras.length - 1];
            scanner.start();
        }
    }).catch(e => console.error(e));

    scanner.addListener('scan', content => {
        snd.play();
        
        const doc_scanner = document.getElementById('doc-scanner');
        const loading_mark = document.getElementById('loading-mark');

        $.ajax({
            url: "includes/ajax.php",
            method: "POST",
            data: {
                pcn: content,
            },
            success: function(result) {
                if(!result) {
                    alert("Invalid QR Code");
                }
                else {
                    data = $.parseJSON(result);
                    if(data["is_verified"] == 1) {
                        alert("You have already claimed your prize.");
                    }
                    else {
                        visitor_name = data["visitor_nickname"];
                        base64_images[data["visitor_nickname"]] = data["photo_base64"];
                        image_file_names = Object.keys(base64_images);
                        
                        doc_scanner.style.display = "none";
                        loading_mark.style.display = "block";
    
                        runPromise();
                    }
                }
            }
        });
        // document.getElementById("result").innerHTML = "PRO Check Number: " + content;
    });

    cameralist.addEventListener('change', content => {
        Instascan.Camera.getCameras().then(cameras => {
            scanner.stop();
            if(cameras.length) {
                for(var i = 0; i < cameras.length; i++) {
                    if(cameralist.value == cameras[i].id) {
                        scanner.camera = cameras[i];
                    }
                }
                scanner.start();
            }
        }).catch(e => console.error(e));
    });
});

const b64toBlob = (b64Data, contentType='', sliceSize=512) => {
    const byteCharacters = atob(b64Data);
    const byteArrays = [];
  
    for (let offset = 0; offset < byteCharacters.length; offset += sliceSize) {
      const slice = byteCharacters.slice(offset, offset + sliceSize);
  
      const byteNumbers = new Array(slice.length);
      for (let i = 0; i < slice.length; i++) {
        byteNumbers[i] = slice.charCodeAt(i);
      }
  
      const byteArray = new Uint8Array(byteNumbers);
      byteArrays.push(byteArray);
    }
  
    const blob = new Blob(byteArrays, {type: contentType});
    return blob;
}

function loadLabeledImages() {
    return Promise.all(
        image_file_names.map(async image_file_name => {

            image_blob = b64toBlob(base64_images[`${ image_file_name }`].replace('data:image/png;base64,', ''), 'image/png');
            image = await faceapi.bufferToImage(image_blob);
            const fullFaceDescription = await faceapi.detectSingleFace(image).withFaceLandmarks().withFaceDescriptor()
            if (!fullFaceDescription) {
                throw new Error(`no faces detected for ${ image_file_name }`)
            }

            const faceDescriptors = [fullFaceDescription.descriptor]
            return new faceapi.LabeledFaceDescriptors(image_file_name, faceDescriptors)

        })
    )
}

async function runPromise() {
    Promise.all([
        faceapi.loadMtcnnModel('/pro-check-legit/models'),
        faceapi.loadFaceRecognitionModel('/pro-check-legit/models'),
        faceapi.loadSsdMobilenetv1Model('/pro-check-legit/models'),
        faceapi.nets.faceLandmark68Net.loadFromUri('/pro-check-legit/models')
    ]).then(run)
}

async function run() {
    const videoEl = document.getElementById('inputVideo')
    const video_canvas = document.getElementById('overlay')
    const doc_scanner = document.getElementById('doc-scanner')
    const face_scanner = document.getElementById('face-scanner')
    const check_mark = document.getElementById('check-mark')
    const loading_mark = document.getElementById('loading-mark');
    const alert_mark = document.getElementById('alert-mark');
    const labeledFaceDescriptors = await loadLabeledImages()

    var still_scanning = true;

    doc_scanner.style.display = 'none';
    loading_mark.style.display = 'none';
    face_scanner.style.display = 'block';
    
    navigator.getUserMedia(
        { video: {} },
        stream => videoEl.srcObject = stream,
        err => console.error(err)
    )

    setInterval(async () => {
        const context = video_canvas.getContext('2d');
        context.clearRect(0, 0, videoEl.width, videoEl.height);

        const mtcnnForwardParams = {
            // number of scaled versions of the input image passed through the CNN
            // of the first stage, lower numbers will result in lower inference time,
            // but will also be less accurate
            maxNumScales: 10,
            // scale factor used to calculate the scale steps of the image
            // pyramid used in stage 1
            scaleFactor: 0.709,
            // the score threshold values used to filter the bounding
            // boxes of stage 1, 2 and 3
            scoreThresholds: [0.7, 0.8, 0.8],
            // mininum face size to expect, the higher the faster processing will be,
            // but smaller faces won't be detected
            minFaceSize: 100
        }

        const options = new faceapi.MtcnnOptions(mtcnnForwardParams)
        const input = document.getElementById('inputVideo')
        const fullFaceDescriptions = await faceapi.detectAllFaces(input, options).withFaceLandmarks().withFaceDescriptors()
        // const fullFaceDescriptions = await faceapi.detectSingleFace(input, options)
        const maxDescriptorDistance = 0.6
        const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, maxDescriptorDistance)
        
        const results = fullFaceDescriptions.map(fd => faceMatcher.findBestMatch(fd.descriptor))

        results.forEach((bestMatch, i) => {
            const box = fullFaceDescriptions[i].detection.box
            const text = bestMatch.toString()

            while(still_scanning) {
                if(text.includes(visitor_name)) {
                    points += 1;
                    wrong_points = 0;
                    
                    console.log(points);
    
                    if (points == 10) {
                        $.ajax({
                            url: "includes/ajax.php",
                            method: "POST",
                            data: {
                                verified_pcn: data["pcn"],
                            },
                            success: function() {
                                face_scanner.style.display = 'none';
                                check_mark.style.display = 'block';

                                // Redirect to any 3 sites =) ? pcn = pcn;
                                // var urls = [
                                //     "https://sites.google.com/view/philsysstep1/home",
                                //     "https://sites.google.com/view/philsys-check/home",
                                //     "https://sites.google.com/view/ephilid/home",
                                // ];

                                // const url = urls[Math.floor(Math.random() * urls.length)];

                                // setTimeout(() => { location.replace(url + "?pcn=" + data['pcn']  ); }, 5000);
                            }
                        });

                        points = 0;

                        still_scanning = false;
                    }
                }
                else {
                    wrong_points += 1;
                    points = 0;

                    console.log(wrong_points);

                    if(wrong_points == 15) {
                        face_scanner.style.display = 'none';
                        alert_mark.style.display = 'block';

                        still_scanning = false;
                    }
                }
            }
        })
    })
}