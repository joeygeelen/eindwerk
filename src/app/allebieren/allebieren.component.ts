import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaderResponse, HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-allebieren',
  templateUrl: './allebieren.component.html',
  styleUrls: ['./allebieren.component.sass']
})
export class AllebierenComponent implements OnInit {

  title = 'Eindwerk';

  GET_SERVER_URL = 'https://wdev.be/joey/be/restapi/bieren';
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
        .subscribe((result: any) => {
          this.bieren = result.results;
        });
    // put data in to variable for html-usage
  }

  ngOnInit() {
  }

}
