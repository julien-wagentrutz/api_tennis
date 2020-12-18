class Tonny {

    constructor(apiKey = null) {
        if(apiKey == null)
        {
            throw new Error('Missing api key')
        }
        this.apiKey = apiKey
        this.apiUrl = "https://tonnyapi.herokuapp.com/api/"
    }

    /**
     *
     * Create Card
     *
     * param : size => little / medium / big
     *         player => player id
     *
     * return : html element of card
    **/

    cardPlayer(size = 'medium', playerId,elementId = null, theme = 'light')
    {
        if(playerId == null)
        {
            throw new Error('Missing player Id')
        }


        //request player
        this.getOneById('players',playerId).then(
            (res)=> {
                //generation card
                if(elementId != null)
                {
                    document.querySelector(elementId).innerHTML = this.generateCard(size,res,theme);
                }
                return res
            }
        )

    }

    /**
     *
     * Get one player by his id => request on api
     *
     * param : entity => name of the entity
     *         id => id of row search
     *
     * return : ??
     **/
    async getOneById(entity, id)
    {
        const url = this.apiUrl + entity + '/' + id
        let res = await this.requestApi(url,this.apiKey)
        return JSON.parse(res)
    }

    /**
     *
     * Make a request on the api
     *
     * param : url to ask of api
     *
     * return : json result
     **/
   requestApi(url,apiKey)
    {
        return new Promise(
            resolve => {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        let parser = new DOMParser();
                         resolve(this.responseText);
                    }
                };
                xhttp.open("GET", url, true);
                xhttp.setRequestHeader("X-AUTH-TOKEN", apiKey);
                xhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
                xhttp.send();
            }
        )
    }

    generateCard(type, data, theme)
    {
        const birthDate = Date.parse(data.birthDate)
        const todayDate = Date.now()
        let age = Math.round((todayDate - birthDate)/3.154e+10)

        if(type == 'little')
        {
            return  `
<div class="cardLittle ${theme}">
                    <div class="top_card ">
                        <div class="left_info_card">
                            <p class="name">${data.name} <span class="lastName">${data.lastName}</span></p>
                            <div class="block_rank">
                                <p class="label_rank">Single rank</p>
                                <span class="rank">${data.id}</span>
                            </div>
                        </div>
                        <div class="right_info_card">
                            <div class="round_img">
                                <img class="img" src="${data.imgPath}" alt="${data.name} ${data.lastName}">
                            </div>
                            <div class="block_flag">
                                <span>${data.country.iso2}</span>
                                <img src="./flags-mini/${data.country.flagPath}" alt="${data.country.fullName}">
                            </div>
                        </div>
                    </div>
                    <div class="bottom_card">
                        <div class="top_info">
                            <p>Age <span>${age}</span></p>
                            <p>Titles <span>9</span></p>
                        </div>
                        <div class="bottom-info">
                            <p>Turned Pro <span>${data.turnedProDate}</span></p>
                        </div>
                    </div>
                </div>
`;
        }
        else if(type == 'middle')
        {

        }
        else if(type =='big')
        {

        }
        else throw new Error('sice undifine')
    }
}






const cardMedium = `

`;

const cardBig = `

`;