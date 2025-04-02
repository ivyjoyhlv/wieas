<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wassup chat app</title>
    <link rel="stylesheet" href="/styles.css">

</head>
<style>
    body{
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}

.title{
    top: 0;
    width: 100%;
    z-index: 1;
    display: block;
    position: absolute;
    background-color: #444444;
    color: white;
   margin: 0;
   padding: 5px;
}

.entry-modal{
    border: 1px solid #444444;
    width: 300px;
    margin: auto;
    z-index: 9999;
    position: absolute;
    left: 50%;
    top: 70;
    margin-left: -150px;
    padding: 5px;
    color: #fff;
    background-color: #444444;
    text-align: center;
}

#notification{
    position: absolute;
    z-index: 1;
    text-align: center;
    color: #fff;
    margin: 0;
    top: 47.33px;
    font-size: 18pt;
    width: 100%;
    background-color: orange;
}


.room-input{
  border: none;
  padding:5px;
}

button{
    margin: 3px;
    padding: 5px;
}

#remote-video{
    top: 0;
    height: 100%;
    width: 100%;
    left: 0;
    background-color: lightgray;
    position: absolute;
}

#local-video{
    top: 60;
    width: 300;
    object-fit: cover;
    height: 150;
    z-index: 1;
    right: 15;
    background-color: #444444;
    position: absolute;
}
a{
    color: #f2f2f2;
    padding: 10px 12px;
    font-size: 17px;
    text-decoration: none;
}
a:hover {
    background-color: #ddd;
    color: black;
  }
  a.active {
    background-color: #04AA6D;
    color: white;
  }
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: #F8F8F8;
    font-family: 'Roboto', sans-serif;
}
section.chat__section {
    width: 800px;
    max-width: 30%;
    background: #fff;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}
.brand {
    padding: 20px;
    background: #f1f1f1;
    display: flex;
    align-items: center;
}
.brand h1 {
    text-transform: uppercase;
    font-size: 20px;
    color: #444;
    margin-left: 10px;
}
.message__area{
    height: 500px;
    padding: 16px;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
    padding-top: 40px;
}
textarea {
    width: 100%;
    border: none;
    padding: 20px;
    font-size: 16px;
    outline: none;
    background: #FBFBFB;
}

.message {
    padding: 20px; 
    border-radius: 4px; 
    margin-bottom: 40px;
    max-width: 300px;
    position: relative;
}
.incoming {
    background: #8F8BE8;
    color: #fff;  
}
.outgoing {
    background: #e9eafd;
    color: #787986;
    margin-left: auto;
}
.message h4 {
    position: absolute;
    top: -20px;
    left: 0;
    color: #333;
    font-size: 14px;
}
.title{
    top: 0;
    width: 100%;
    z-index: 1;
    display: block;
    position: absolute;
    background-color: #444444;
    color: white;
   margin: 0;
   padding: 5px;
}

.entry-modal{
    border: 1px solid #444444;
    width: 300px;
    /* margin: auto; */
    /* z-index: 9999; */
    top: 70;
    margin-left: 150px;
    padding: 5px;
    color: #fff;
    background-color: #444444;
    text-align: center;
}

#notification{
    position: absolute;
    z-index: 1;
    text-align: center;
    color: #fff;
    margin: 0;
    top: 47.33px;
    font-size: 18pt;
    width: 100%;
    background-color: orange;
}


.room-input{
    border: none;
    padding:5px;
  }
  
  button{
      margin: 3px;
      padding: 5px;
  }
  
  #remote-video{
      /* top: 0;
      height: 100%;
      width: 100%;
      left: 0;
      background-color: lightgray;
      position: absolute; */
  }
  
  #local-video{
      top: 60;
      width: 300;
      /* object-fit: cover; */
      /* height: 150;
      z-index: 1;
      right: 15; */
      /* background-color: #444444; */
      /* position: absolute; */
  }
</style>
<body>
    <h1 class="title">Meeting
        <a class="active" href="#video">Video Meeting</a>
    </h1>
    
    <p id="notification" hidden></p>
    <div class="entry-modal" id="entry-modal">
        <p>Create or Join Meeting</p>
        <input id="room-input" class="room-input" placeholder="Enter Room ID">
        <div>
            <button onclick="createRoom(0)">Create Room</button>
            <button onclick="joinRoom()">Join Room</button>
        </div>
    </div>
    <div class="meet-area">
        <video id="remote-video"></video>
        <video id="local-video"></video>
        <div id="showMute" class="showMute">

            <button onclick="mute_audio()">Mute Audio</button>
            <button onclick="mute_video()">Mute Video</button>
           
        </div>
    </div>
    <section class="chat__section">
        <div class="brand">
            <img height="40" src="/wassup.png" alt="">
            <h1>Chat Box</h1>
        </div>
        <div class="message__area"></div>
        <div>
            <textarea id="textarea" cols="30" rows="1" placeholder="Write a message..."></textarea>
        </div>
    </section>
    <script>//show mute
            document.getElementById("showMute").hidden = true;
    </script>
    <script src="/socket.io/socket.io.js">//socket.io
    </script>
    <script>//client.js
    const socket = io()
let name;
let textarea = document.querySelector('#textarea')
let messageArea = document.querySelector('.message__area')
do {
    name = prompt('Please enter your name: ')
} while(!name)

textarea.addEventListener('keyup', (e) => {
    if(e.key === 'Enter') {
        sendMessage(e.target.value)
    }
})

function sendMessage(message) {
    let msg = {
        user: name,
        message: message.trim()
    }
    // Append 
    appendMessage(msg, 'outgoing')
    textarea.value = ''
    scrollToBottom()

    // Send to server 
    socket.emit('message', msg)

}

function appendMessage(msg, type) {
    let mainDiv = document.createElement('div')
    let className = type
    mainDiv.classList.add(className, 'message')

    let markup = `
        <h4>${msg.user}</h4>
        <p>${msg.message}</p>
    `
    mainDiv.innerHTML = markup
    messageArea.appendChild(mainDiv)
}

// Recieve messages 
socket.on('message', (msg) => {
    appendMessage(msg, 'incoming')
    scrollToBottom()
})

function scrollToBottom() {
    messageArea.scrollTop = messageArea.scrollHeight
}

    </script>
    <script src="https://unpkg.com/peerjs@1.3.1/dist/peerjs.min.js"></script>
    <script >//script.js
        const PRE = "VIT"
const SUF = "MEET"
var room_id;
var getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
var local_stream;
function createRoom(counter){

    console.log("Creating Room")
    let room = document.getElementById("room-input").value;
    if(room == " " || room == "")   {
        alert("Please enter room number")
        return;
    }
    room_id = PRE+room+SUF;
    let  peer = new Peer(room_id)
    peer.on('open', (id)=>{
        console.log("Peer Connected with ID: ", id)
        hideModal()
        showMute()

        // var video_button = document.createElement("video_button");
        // video_button.appendChild(document.createTextNode("Toggle hold"));

        getUserMedia({video: true, audio: true}, (stream)=>{
            local_stream = stream;
            setLocalStream(local_stream)
        },(err)=>{
            console.log(err)
        })
        notify("Waiting for peer to join.")
    })
    peer.on('call',(call)=>{
        call.answer(local_stream);
        call.on('stream',(stream)=>{
            setRemoteStream(stream)
        })
    })

    

}

function mute_audio(){
    local_stream.getAudioTracks()[0].enabled = !(local_stream.getAudioTracks()[0].enabled);
}
function mute_video(){
    local_stream.getVideoTracks()[0].enabled = !(local_stream.getVideoTracks()[0].enabled);
}



function setLocalStream(stream){
    
    let video = document.getElementById("local-video");
    video.srcObject = stream;
    video.muted = false;
    video.play();
}
function setRemoteStream(stream){
   
    let video = document.getElementById("remote-video");
    video.srcObject = stream;
    video.play();
}

function hideModal(){
    document.getElementById("entry-modal").hidden = true
}
function showMute(){
    document.getElementById("showMute").hidden = false;
}

function notify(msg){
    let notification = document.getElementById("notification")
    notification.innerHTML = msg
    notification.hidden = false
    setTimeout(()=>{
        notification.hidden = true;
    }, 3000)
}

function joinRoom(){
    console.log("Joining Room")
    let room = document.getElementById("room-input").value;
    if(room == " " || room == "")   {
        alert("Please enter room number")
        return;
    }
    room_id = PRE+room+SUF;
    hideModal()
    showMute()
    let peer = new Peer()
    peer.on('open', (id)=>{
        console.log("Connected with Id: "+id)
        getUserMedia({video: true, audio: true}, (stream)=>{
            local_stream = stream;
            setLocalStream(local_stream)
            notify("Joining peer")
            let call = peer.call(room_id, stream)
            call.on('stream', (stream)=>{
                setRemoteStream(stream);
            })
        }, (err)=>{
            console.log(err)
        })

    })
}
    </script>
    <script>//main.js
        'use strict';

// Put variables in global scope to make them available to the browser console.
const constraints = window.constraints = {
  audio: false,
  video: true
};

function handleSuccess(stream) {
  const video = document.querySelector('video');
  const videoTracks = stream.getVideoTracks();
  console.log('Got stream with constraints:', constraints);
  console.log(`Using video device: ${videoTracks[0].label}`);
  window.stream = stream; // make variable available to browser console
  video.srcObject = stream;
}

function handleError(error) {
  if (error.name === 'ConstraintNotSatisfiedError') {
    const v = constraints.video;
    errorMsg(`The resolution ${v.width.exact}x${v.height.exact} px is not supported by your device.`);
  } else if (error.name === 'PermissionDeniedError') {
    errorMsg('Permissions have not been granted to use your camera and ' +
      'microphone, you need to allow the page access to your devices in ' +
      'order for the demo to work.');
  }
  errorMsg(`getUserMedia error: ${error.name}`, error);
}

function errorMsg(msg, error) {
  const errorElement = document.querySelector('#errorMsg');
  errorElement.innerHTML += `<p>${msg}</p>`;
  if (typeof error !== 'undefined') {
    console.error(error);
  }
}

async function init(e) {
  try {
    const stream = await navigator.mediaDevices.getUserMedia(constraints);
    handleSuccess(stream);
    e.target.disabled = true;
  } catch (e) {
    handleError(e);
  }
}

document.querySelector('#showVideo').addEventListener('click', e => init(e));
    </script>
    <script>//test.js
        export default {
  'It should have a video element': (browser) => {
    const path = '/src/content/getusermedia/gum/index.html';
    const url = 'file://' + process.cwd() + path;

    browser.url(url)
        .waitForElementVisible('button#showVideo', 1000)
        .click('button#showVideo')
        .waitForElementVisible('video')
        .waitForMediaPlaybackReady('video', 5000)
        .end();
  }
};
    </script>
    <script>//vaishnavi.js
        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

var myStream;
var peer = new Peer({key: 'PeerJS key'});

var setOthersStream = function(stream){
  $('#others-video').prop('src', URL.createObjectURL(stream));
};

var setMyStream = function(stream){
  myStream = stream;
  $('#video').prop('src', URL.createObjectURL(stream));
};

peer.on('open', function(id){
  $('#peer-id').text(id);
});

peer.on('call', function(call){
  call.answer(myStream);
  call.on('stream', setOthersStream);
});

$(function(){
  navigator.getUserMedia({audio: true, video: true}, setMyStream, function(){});
  $('#call').on('click', function(){
    var call = peer.call($('#others-peer-id').val(), myStream);
    call.on('stream', setOthersStream);
  });
});

peer.on('error', function(e){
  console.log(e.message);
});

//create button to toggle video
var video_button = document.createElement("video_button");
video_button.appendChild(document.createTextNode("Toggle hold"));

video_button.video_onclick = function(){
  myStream.getVideoTracks()[0].enabled = !(myStream.getVideoTracks()[0].enabled);
}

var audio_button = document.createElement("audio_button");
video_button.appendChild(document.createTextNode("Toggle hold"));

audio_button.audio_onclick = function(){
  myStream.getAudioTracks()[0].enabled = !(myStream.getAudioTracks()[0].enabled);
}
    </script>
    </body>
</html>