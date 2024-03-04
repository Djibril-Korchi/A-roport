import { Component, OnInit, OnDestroy } from '@angular/core';
import { PlecariClass } from '../Classes/plecari-class';
import { AeroportService } from '../services/aeroport.service';
import { interval } from 'rxjs';
import { startWith, switchMap } from 'rxjs/operators';

@Component({
  selector: 'app-plecari',
  templateUrl: './plecari.component.html',
  styleUrls: ['./plecari.component.css']
})
export class PlecariComponent implements OnInit, OnDestroy {

  titlu = "Plecari - Departures";

  pollingData: any;

  lstPlecari:PlecariClass[];

  constructor(private apiPlecari: AeroportService,) {
    this.PollValues();
   }

  ngOnInit() {
    
  }
  
  ngOnDestroy() {
    this.pollingData.unsubscribe();
  }

  PollValues(): any {
    this.pollingData=interval(1000)
    .pipe(
      startWith(0),
      switchMap(() => this.apiPlecari.getApiPlecari())
    )
    .subscribe(
      res => {
        this.lstPlecari = res
        console.log("In subscribe: " + res);
      }
    )
  }
}

