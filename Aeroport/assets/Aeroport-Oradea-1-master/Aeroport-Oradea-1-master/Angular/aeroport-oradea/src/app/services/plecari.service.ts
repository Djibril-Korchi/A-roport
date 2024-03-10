import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PlecariClass } from '../Classes/plecari-class';
import { map } from 'rxjs/operators';

@Injectable()
export class PlecariService {
    constructor(
        private http: HttpClient
    ){}

    getApi(): Observable<any> {
        return this.http.get('http://192.168.0.120:3000/todos')
        
      }
      
}