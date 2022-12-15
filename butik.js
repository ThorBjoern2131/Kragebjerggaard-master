export default class produkter {
    constructor() {
        this.data = {
            password:"KickPHP"
        }

        this.rootElem = document.querySelector('.produkter');
        this.filter = this.rootElem.querySelector('.filter');
        this.items = this.rootElem.querySelector('.items');

        this.nameSearch = this.filter.querySelector('.nameSearch');
    }

    async init(){
        this.nameSearch.addEventListener('input', () => {
            this.render();
        });

        //await this.render();
    }

    async render(){
        const data = await this.getData();
        console.log(data);

        const row = document.createElement('div');
        row.classList.add('row', 'g-4');

        for(const item of data){
            const col = document.createElement('div');
            col.classList.add('col-md-6', 'col-lg-4', 'col-xl-3', 'shadow');

            col.innerHTML = `
            <div class="row">
                
                <div class="col-4">
                        <img src="images/${item.prodImage}" class="card-img-top" alt="cover">
                </div>
              
                <div class="col-6">
                    <div class="card-body">
                        <a href="butik.js"><h5 class="card-img-top ">${item.prodNavn} </h5></a>
                        <h5 class="card-text">${item.prodBeskrivelse} </h5>
                        <h5 class="card-text">${item.prodVare} </h5>
                        <p class="card-text">${item.prodPris} </p>
                        <p class="card-text">${item.prodAmount} </p>
                        <a href="Shop.php" class="btn btn-primary text-white w-100">Se produkt</a>
                    </div>
                </div>
            </div>
        `;

            row.appendChild(col);
        }

        this.items.innerHTML = '';
        this.items.appendChild(row);

    }

    async getData(){
        this.data.nameSearch = this.nameSearch.value;

        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();
    }

}