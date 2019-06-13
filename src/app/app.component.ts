import { Component } from '@angular/core';
import { HttpClient, HttpHeaderResponse, HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.sass']
})
export class AppComponent {
    title = 'Eindwerk';

    GET_SERVER_URL = 'http://localhost/eindwerk/webshop/restapi/bieren';
    // DELETE_SERVER_URL = 'http://localhost/nootnoot/user/';
    // PUT_SERVER_URL = 'http://localhost/nootnoot/user/';
    // POST_SERVER_URL = 'http://localhost/nootnoot/users';
     users: any;
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

                // put data in to variable for html-usage
                this.users = result;
            });
    }
}
