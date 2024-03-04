import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PlecariClass } from '../Classes/plecari-class';
import { map } from 'rxjs/operators';

@Injectable()
export class AeroportService {
    constructor(
        private http: HttpClient
    ){}

    getApiPlecari(): Observable<any> {
        return this.http.get('http://192.168.0.121:8000/flights')
      }
    
    getApiSosiri(): Observable<any> {
        return this.http.get('https://jsonplaceholder.typicode.com/todos')
    }
}