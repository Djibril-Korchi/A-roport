import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HeaderTabeleComponent } from './header-tabele.component';

describe('HeaderTabeleComponent', () => {
  let component: HeaderTabeleComponent;
  let fixture: ComponentFixture<HeaderTabeleComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HeaderTabeleComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HeaderTabeleComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
