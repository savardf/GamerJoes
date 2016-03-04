window.addEventListener("load",init,false);
var noImg = 0;
var stopInterval;
var captionText = new Array(
	"Images/Visionneuse/img0.jpg",
	"Images/Visionneuse/img1.jpg",
	"Images/Visionneuse/img2.jpg",
	"Images/Visionneuse/img3.jpg",
	"Images/Visionneuse/img4.jpg",
	"Images/Visionneuse/img5.jpg",
	"Images/Visionneuse/img6.jpg",
	"Images/Visionneuse/img7.jpg",
	"Images/Visionneuse/img8.jpg"
);
function init()
{
	
	for(var i=0;i<=8;i++)
	{
		document.getElementById("img"+i).addEventListener("click",afficherGrandeImage,false);
		document.getElementById("img"+i).addEventListener("mouseover",afficherBordure,false);
		document.getElementById("img"+i).addEventListener("mouseout",enleverBordure,false);
	}
	document.getElementById("image").src = "Images/Visionneuse/img1.jpg";
	document.getElementById("boucle").addEventListener("click",boucle,false);
	document.getElementById("arretBoucle").addEventListener("click",arretBoucle,false);
	document.getElementById("precedent").addEventListener("click",precedent,false);
	document.getElementById("suivante").addEventListener("click",suivant,false);
    
}

function afficherGrandeImage(e)
{
	document.getElementById("image").src = "images/Visionneuse/" + e.target.id + ".jpg";
}

function afficherBordure(e)
{
	
	
	e.target.className = "survolPar";

}

function enleverBordure(e)
{
	e.target.className = null;

}
function boucle()
{
	stopInterval = setInterval("suivant()", 2000);
    document.getElementById("boucle").disabled=true;
    
}
function arretBoucle()
{
	document.getElementById("boucle").disabled=false;
    clearInterval(stopInterval);
}
function precedent()
{
	noImg--;
	
	if (noImg == -1){
		noImg = captionText.length - 1;
	}
	
	document.getElementById("image").src = "Images/Visionneuse/img" + noImg + ".jpg";
	document.getElementById("img"+(noImg+1)).className=null;
	document.getElementById("img"+noImg).className = "survolPar";
	
	
}
function suivant()
{
	noImg++;
	
	if (noImg == captionText.length){
		noImg = 0;
	}
	
	document.getElementById("image").src = "Images/Visionneuse/img" + noImg + ".jpg";
	document.getElementById("img"+(noImg-1)).className = null;
	document.getElementById("img"+noImg).className="survolPar";
	
	
}



