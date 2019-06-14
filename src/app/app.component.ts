import { Component } from '@angular/core';
import { HttpClient, HttpHeaderResponse, HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.sass']
})
export class AppComponent {
    title = 'Eindwerk';

    GET_SERVER_URL = 'https://wdev.be/joey/webshop/restapi/bieren';
    // DELETE_SERVER_URL = 'http://localhost/nootnoot/user/';
    // PUT_SERVER_URL = 'http://localhost/nootnoot/user/';
    // POST_SERVER_URL = 'http://localhost/nootnoot/users';
     bieren: any;
    request = new XMLHttpRequest();
    id;
    name;

    constructor(private http: HttpClient) {
        // get data when refreshed
        this.getRequest();
    }

    // ----- GET -----
    getRequest() {
        // get call + responseType = give response as text
        this.http.get(this.GET_SERVER_URL, {responseType: 'json'})
            .subscribe((result) => {
                console.log(JSON.stringify(result));
                let tempArr = {};
                Object.keys(result).forEach( key => {
                    tempArr['merk'] = [result[key].merk];
                    tempArr['naam'] = [result[key].naam];
                    tempArr['inhoud'] = [result[key].inhoud];
                    tempArr['prijs'] = [result[key].prijs];
                    tempArr['percentage'] = [result[key].percentage];
                    tempArr['kleur'] = [result[key].kleur];
                    tempArr['streek'] = [result[key].streek];
                    tempArr['img'] = [result[key].img];
                });
                // put data in to variable for html-usage
                this.bieren = [tempArr];
            });
    }
}
