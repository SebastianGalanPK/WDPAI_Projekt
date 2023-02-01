const search = document.querySelector('input[id="community-search"]');
const communityContainer = document.querySelector('#search-result');

search.addEventListener("keyup", function (event) {
    event.preventDefault();

    const data = {search: this.value};

    fetch("/search", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (communities) {
        communityContainer.innerHTML = "";
        loadCommunities(communities)
    });
});

function loadCommunities(communities){
    communities.forEach(community => {
        createCommunity(community);
    });
}

function createCommunity(community){
    const template = document.querySelector("#community-template");

    const clone = template.content.cloneNode(true);

    const container = clone.querySelector(".community");
    container.setAttribute("id", community.nickname);

    console.log(community);

    const name = clone.querySelector('.cm-name');
    name.innerHTML = community.name;

    communityContainer.appendChild(clone);
    reloadButtons();
}