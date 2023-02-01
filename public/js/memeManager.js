const likeButtons = document.querySelectorAll(".like-button");
const dislikeButtons = document.querySelectorAll(".dislike-button");
const removeButtons = document.querySelectorAll(".remove-button");
const favouriteMemeButtons = document.querySelectorAll(".favourite-meme-button");

function giveLike(){
    const likes = this;
    const dislikes = this.parentElement.querySelector(".dislike-button");

    const container = likes.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    const voteNuber = likes.parentElement.querySelector(".vote-number");

    fetch('/like/'+id+'/9').then(function (){
        voteNuber.innerHTML = parseInt(voteNuber.innerHTML) + 1;
    });

    likes.setAttribute('style', 'color: green');
    dislikes.setAttribute('style', 'color: white');
}

function giveDislike(){
    const dislikes = this;
    const likes = this.parentElement.querySelector(".like-button");

    const container = dislikes.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    const voteNuber = dislikes.parentElement.querySelector(".vote-number");

    fetch('/dislike/'+id+'/9').then(function (){
        voteNuber.innerHTML = parseInt(voteNuber.innerHTML) - 1;
    });

    likes.setAttribute('style', 'color: white');
    dislikes.setAttribute('style', 'color: red');
}

function removeMeme(){
    const removeButton = this;

    const container = removeButton.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    fetch('/remove/'+id).then(function (){
        container.setAttribute('style', 'display: none');
    });
}
function addFavouriteMeme(){

}

likeButtons.forEach(button => button.addEventListener("click", giveLike));
dislikeButtons.forEach(button => button.addEventListener("click", giveDislike));
removeButtons.forEach(button => button.addEventListener("click", removeMeme));
favouriteMemeButtons.forEach(button=>button.addEventListener("click", addFavouriteMeme));