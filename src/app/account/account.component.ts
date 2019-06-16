import { Component, OnInit } from '@angular/core';
import {UserService} from '../user.service';

@Component({
  selector: 'app-account',
  templateUrl: './account.component.html',
  styleUrls: ['./account.component.sass']
})
export class AccountComponent implements OnInit {

  message = 'Loading....';

  constructor(private user: UserService) { }

  ngOnInit() {
    this.user.getSomeData().subscribe(data => {
      this.message = data.message;
    });
  }

}
