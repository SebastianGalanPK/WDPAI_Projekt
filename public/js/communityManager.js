communityButtons = document.querySelectorAll(".cm-button");
starButtons = document.querySelectorAll(".cm-star-button");

function selectCommunity(){
    const button = this;

    const container = button.parentElement;
    const id = container.getAttribute("id");

    window.open("/community/"+id,'_self');
}

function toggleCommunityFavourite(){
    const button = this;

    const container = button.parentElement;
    const id = container.getAttribute("id");

    fetch('/toggleCommunityStatus/'+id).then(function (){
        if(button.style.color=="yellow"){
            button.setAttribute('style', 'color: white');
        }
        else{
            button.setAttribute('style', 'color: yellow');
        }
    });
}

function reloadButtons(){
    communityButtons = document.querySelectorAll(".cm-button");
    communityButtons.forEach(item => item.addEventListener("click", selectCommunity));

    starButtons = document.querySelectorAll(".cm-star-button");
    starButtons.forEach(item=>item.addEventListener("click", toggleCommunityFavourite));
}
communityButtons.forEach(item => item.addEventListener("click", selectCommunity));
starButtons.forEach(item=>item.addEventListener("click", toggleCommunityFavourite));