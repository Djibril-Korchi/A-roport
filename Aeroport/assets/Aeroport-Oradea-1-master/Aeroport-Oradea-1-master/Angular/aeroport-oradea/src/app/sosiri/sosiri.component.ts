import { Component, OnInit, Input } from '@angular/core';
import { SosiriClass } from '../classes/sosiri-class';
import { interval } from 'rxjs';
import { startWith, switchMap } from 'rxjs/operators';
import { AeroportService } from '../services/aeroport.service';

@Component({
  selector: 'app-sosiri',
  templateUrl: './sosiri.component.html',
  styleUrls: ['./sosiri.component.css']
})
export class SosiriComponent implements OnInit {
  titlu = 'Sosiri - Arrivals';

  constructor(private apiSosiri: AeroportService,) {
    setInterval(() => {
      this.currentDate = new Date();
    }, 1);
    this.PollValues();
   }

  ngOnInit(): void {
  }
  currentDate = new Date();
  pollingData: any;

  lstSosiri:SosiriClass[];

  ngOnDestroy() {
    this.pollingData.unsubscribe();
  }

  PollValues(): any {
    this.pollingData=interval(1000)
    .pipe(
      startWith(0),
      switchMap(() => this.apiSosiri.getApiSosiri())
    )
    .subscribe(
      data => {
        this.lstSosiri = data
      }
    )
  }
}
