<html>
<head>
<title>Firebase File Upload</title>

<meta
name="viewport"
content="width=device-width, initial-scale=1, maximum-scale=1"
/>
<style>
	body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  margin: 0;
  padding: 0;
  background-color: #f5f5f5;
}

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #ffffff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

input[type="file"] {
  display: block;
  margin-bottom: 10px;
}

button {
  display: block;
  margin: 10px 0;
  padding: 10px 20px;
  background-color: #0077c2;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease;
}

button:hover {
  background-color: #005ea3;
}

#uploading {
  margin-top: 20px;
}

.file {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
  background-color: #f9f9f9;
  border-radius: 5px;
  margin-bottom: 10px;
}

.file-name {
  margin-right: 10px;
}

.file a {
  text-decoration: none;
  color: #0077c2;
  transition: all 0.3s ease;
}

.file a:hover {
  text-decoration: underline;
  color: #005ea3;
}

.progress {
  width: 100%;
  height: 10px;
  margin-bottom: 10px;
  background-color: #e0e0e0;
  border-radius: 5px;
  overflow: hidden;
}

.progress-bar {
  height: 100%;
  background-color: #0077c2;
  border-radius: 5px;
  transition: width 0.3s ease;
}

</style>

</head>
<body>
<div>
Upload Files<br />
<input type="file" id="files" multiple /><br /><br />
<button id="send">Upload</button>
<p id="uploading"></p>
<progress value="0" max="100" id="progress"></progress>
</div>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-storage.js"></script>

<script>
// Your web app's Firebase configuration
const firebaseConfig = {
	apiKey: "AIzaSyC8hcKUqR0a-oJRS2pFszdopO_tPzFYbgs",
  authDomain: "staffroom-ba24d.firebaseapp.com",
  databaseURL: "https://staffroom-ba24d-default-rtdb.firebaseio.com",
  projectId: "staffroom-ba24d",
  storageBucket: "staffroom-ba24d.appspot.com",
  messagingSenderId: "793743844002",
  appId: "1:793743844002:web:29731b70fd8366bf55edfb",
  measurementId: "G-JNZZRXQ8T6"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
</script>

<script>
var files = [];
document.getElementById("files").addEventListener("change", function(e) {
  files = e.target.files;
  for (let i = 0; i < files.length; i++) {
    console.log(files[i]);
  }
});

document.getElementById("send").addEventListener("click", function() {
  //checks if files are selected
  if (files.length != 0) {
    //Loops through all the selected files
    for (let i = 0; i < files.length; i++) {
      //create a storage reference
      var storage = firebase.storage().ref(files[i].name);

      //upload file
      var upload = storage.put(files[i]);

      //update progress bar
      upload.on(
        "state_changed",
        function progress(snapshot) {
          var percentage =
            (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
          document.getElementById("progress").value = percentage;
        },

        function error() {
          alert("error uploading file");
        },

        function complete() {
          document.getElementById(
            "uploading"
          ).innerHTML += `${files[i].name} uploaded <br />`;
        }
      );
    }
  } else {
    alert("No file chosen");
  }
});

function getFileUrl(filename) {
  //create a storage reference
  var storage = firebase.storage().ref(filename);

  //get file url
  storage
    .getDownloadURL()
    .then(function(url) {
      console.log(url);
    })
    .catch(function(error) {
      console.log("error encountered");
    });
}
</script>
</body>
</html>

