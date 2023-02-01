communityButtons = document.querySelectorAll(".cm-button");

function selectCommunity(){
    const dislikes = this;

    const container = dislikes.parentElement;
    const id = container.getAttribute("id");

    window.open("/community/"+id,'_self');
}

function reloadButtons(){
    communityButtons = document.querySelectorAll(".cm-button");

    communityButtons.forEach(item => item.addEventListener("click", selectCommunity));
}
communityButtons.forEach(item => item.addEventListener("click", selectCommunity));