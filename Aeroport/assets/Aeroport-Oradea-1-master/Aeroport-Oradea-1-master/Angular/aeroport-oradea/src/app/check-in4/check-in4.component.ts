import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-check-in4',
  templateUrl: './check-in4.component.html',
  styleUrls: ['./check-in4.component.css']
})
export class CheckIn4Component implements OnInit {

  constructor() {
    setInterval(() => {
      this.currentDate = new Date();
    }, 1);
   }

  ngOnInit(): void {
  }
  currentDate = new Date();
}

