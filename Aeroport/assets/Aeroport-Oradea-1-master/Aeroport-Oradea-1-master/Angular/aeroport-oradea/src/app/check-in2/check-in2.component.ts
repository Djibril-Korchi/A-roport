import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-check-in2',
  templateUrl: './check-in2.component.html',
  styleUrls: ['./check-in2.component.css']
})
export class CheckIn2Component implements OnInit {

  constructor() {
    setInterval(() => {
      this.currentDate = new Date();
    }, 1);
   }

  ngOnInit(): void {
  }
  currentDate = new Date();
}

