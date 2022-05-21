var config=require('./config.js');
var images=require('./imagex.json');
var fs = require("fs"),
    http=require("http"),
    request = require('request');
const ImgixClient = require("@imgix/js-core");

const client = new ImgixClient({
  domain: 'mobidonia.imgix.net',
  secureURLToken: 'N3WHszCXPFS5TGtf',
});

const download = function(uri, filename, callback){
  request.head(uri, function(err, res, body){
    request(uri).pipe(fs.createWriteStream(filename)).on('close', callback);
  });
};


var androidImages=[["mipmap-hdpi",72],["mipmap-mdpi",48],["mipmap-xhdpi",96],["mipmap-xxhdpi",324],["mipmap-xxxhdpi",432]];
androidImages.forEach(element => {
  images.images.push( {
    "size":element[1],
    "filename":"android/app/src/main/res/"+element[0]+"/ic_launcher_foreground.png"
  });
  images.images.push( {
    "size":element[1],
    "filename":"android/app/src/main/res/"+element[0]+"/ic_launcher_round.png"
  });
  images.images.push( {
    "size":element[1],
    "filename":"android/app/src/main/res/"+element[0]+"/ic_launcher.png"
  });
});

var imagesToDownload=[];
images.images.forEach(element => {
  var url = client.buildURL(config.LOGO, {
    w: element.size,
    h: element.size,
  });
  imagesToDownload.push({
    "from":url,
    "to":element.filename
  });
});


function startImageDownload(images,callback){
  if(images.length>0){
    var currentImage=images.pop();
    console.log("Downloading from "+currentImage.from)
    console.log("Downloading to"+currentImage.to)
    download(currentImage.from, currentImage.to, function(){
      startImageDownload(images,callback);
    });
  }else{
    console.log("All images in place.");
    callback();
  }
}
//console.log(imagesToDownload);
startImageDownload(imagesToDownload,function(){
  console.log("Done");
})
