import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-check-in3',
  templateUrl: './check-in3.component.html',
  styleUrls: ['./check-in3.component.css']
})
export class CheckIn3Component implements OnInit {

  constructor() {
    setInterval(() => {
      this.currentDate = new Date();
    }, 1);
   }

  ngOnInit(): void {
  }
  currentDate = new Date();
}

